from flask import Flask, request, jsonify, render_template
from geopy.distance import geodesic
from geopy.point import Point
import requests

app = Flask(__name__)

GOOGLE_MAPS_API_KEY = "AIzaSyDx9mFGBRNOqXB7-1K_4ciASdJK_fH6IJo"
PULSE_ECO_API_URL = "https://skopje.pulse.eco/rest/current"

pm25Breakpoints = [
    {'low': 0.0, 'high': 12.0, 'aqi_low': 0, 'aqi_high': 50}, # Very Low
    {'low': 12.1, 'high': 35.4, 'aqi_low': 51, 'aqi_high': 100}, # Low
    {'low': 35.5, 'high': 55.4, 'aqi_low': 101, 'aqi_high': 150}, # Medium
    {'low': 55.5, 'high': 150.4, 'aqi_low': 151, 'aqi_high': 200}, # High
    {'low': 150.5, 'high': 250.4, 'aqi_low': 201, 'aqi_high': 300} # Very High
]

pm10Breakpoints = [
    {'low': 0, 'high': 54, 'aqi_low': 0, 'aqi_high': 50}, # Very Low
    {'low': 55, 'high': 154, 'aqi_low': 51, 'aqi_high': 100}, # Low
    {'low': 155, 'high': 254, 'aqi_low': 101, 'aqi_high': 150}, # Medium
    {'low': 255, 'high': 354, 'aqi_low': 151, 'aqi_high': 200}, # High
    {'low': 355, 'high': 424, 'aqi_low': 201, 'aqi_high': 300} # Very High
]

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/route", methods=["POST"])
def route():
    userData = request.json
    userLocation = userData["location"]
    distanceKM = float(userData["distance"])
    startPoint = (userLocation["lat"], userLocation["lng"])

    response = requests.get(PULSE_ECO_API_URL)
    data = response.json()

    def sensorsAQICalculation(data):
        filteredData = [sensor for sensor in data if sensor['type'] in ('pm10', 'pm25')]
        # print(filteredData)

        groupedData = {}
        for sensor in filteredData:
            sensorId = sensor['sensorId']
            if sensorId not in groupedData:
                groupedData[sensorId] = []
            groupedData[sensorId].append({'type': sensor['type'], 'value': sensor['value']})

            # print(groupedData)

        def getAQI(value, breakpoints):
            for breakpoint in breakpoints:
                if breakpoint['low'] <= value <= breakpoint['high']:
                    return ((breakpoint['aqi_high'] - breakpoint['aqi_low']) / (breakpoint['high'] - breakpoint['low'])) * (value - breakpoint['low']) + breakpoint['aqi_low']
                
                if value >= breakpoints[-1]['high']:
                    return breakpoints[-1]['aqi_high']
                
            return None
        
        sensorAQI = {}

        for sensorId, pollutants in groupedData.items():
            # print("SENSOR ID", sensorId)
            maxAQI = 0
            for pollutant in pollutants:
                value = float(pollutant['value'])
                if pollutant['type'] == 'pm25':
                    aqi = getAQI(value, pm25Breakpoints)
                elif pollutant['type'] == 'pm10':
                    aqi = getAQI(value, pm10Breakpoints)
                else:
                    continue
                # print("AQI", aqi)
                
                maxAQI = max(maxAQI, aqi)
            # print("MAXAQI", maxAQI)
            sensorAQI[sensorId] = maxAQI

        # print(sensorAQI)

        sensors = {}
        for sensor in data:
            sensorId = sensor['sensorId']
            if sensorId in sensorAQI:
                sensors[sensorId] = {
                    'AQI': sensorAQI[sensorId],
                    'position': sensor['position']
                }
        # print(sensors)
        return sensors

    def sortedMidpoints(startPoint, distanceKM, data):

        midpoints = [
            geodesic(kilometers=distanceKM / 2).destination(startPoint, angle)
            for angle in range(0, 315, 45)
        ]

        sensors = sensorsAQICalculation(data)

        dataForSort=[]
        for midpoint in midpoints:
            distances = [(sensor, geodesic(midpoint, tuple(sensor['position'].split(','))).kilometers) for sensor in sensors.values()]

            closest_sensor, min_distance = min(distances, key=lambda x: x[1])
            dataForSort.append(closest_sensor)

        sortedMidpointByAQI = sorted(dataForSort, key=lambda x: x['AQI'])

        # print(sortedMidpointByAQI)
        return sortedMidpointByAQI
    
    def mostOptimizedRoute(startPoint, sortedMidpointsByAQI):
        sensors = sensorsAQICalculation(data)

        def generatePathWaypoints(start, end, distanceM):
            count = 0
            routeWaypoints = []
            distance = geodesic(start, end).meters
            steps = int(distance // distanceM)

            for i in range(1, steps + 1):
                lat_diff = (end[0] - start[0]) * (i / steps)
                lng_diff = (end[1] - start[1]) * (i / steps)
                count += 1
                routeWaypoints.append((start[0] + lat_diff, start[1] + lng_diff))
                
            if count == 0:
                count = 1
            # print("Route Waypoints:", routeWaypoints)
            # print()
            return routeWaypoints, count
        
        def calculatePointAQI(point, sensors):
            distances = [(sensor, geodesic(point, tuple(map(float, sensor['position'].split(',')))).kilometers) for sensor in sensors.values()]
            closest_sensor, min_distance = min(distances, key=lambda x: x[1])
            return closest_sensor['AQI']
        
        allRoutes = []

        for midpoint in sortedMidpointsByAQI:
            midpointCoordinates = tuple(map(float, midpoint['position'].split(',')))
            pathPoints, count = generatePathWaypoints(startPoint, midpointCoordinates, 500)
            pathData = []

            # print(pathPoints)
            # print(count)
            # print()

            totalAQI = 0

            for point in pathPoints:
                pointAQI = calculatePointAQI(point, sensors)
                totalAQI += pointAQI
                pathData.append({'lat': point[0], 'lng': point[1], 'AQI': pointAQI})
                
            allRoutes.append({
                'midpoint': midpointCoordinates,
                'totalAQI': totalAQI,
                'avgAQI': totalAQI/count,
                'pathData': pathData,
            })

        optimizedRoutes = sorted(allRoutes, key=lambda x: x['avgAQI'])
        
        for route in optimizedRoutes:
            route["distance"] = geodesic(startPoint, route['midpoint']).kilometers
        print("ALL")
        print(optimizedRoutes)
        for optimizedRoute in optimizedRoutes:
            if (distanceKM) - 1 <= optimizedRoute['distance'] <= (distanceKM) + 1:
                return optimizedRoute
        
        return optimizedRoute

    sortedMidpointsByAQI = sortedMidpoints(startPoint, distanceKM, data)
    optimized = mostOptimizedRoute(startPoint, sortedMidpointsByAQI)

    pathData = optimized['pathData']

    waypoints = "|".join(f"{point['lat']},{point['lng']}" for point in pathData)

    directionsURL = (
        f"https://maps.googleapis.com/maps/api/directions/json?"
        f"origin={startPoint[0]},{startPoint[1]}"
        f"&destination={startPoint[0]},{startPoint[1]}"
        # f"&waypoints={waypoint_coords[0]},{waypoint_coords[1]}"
        f"&waypoints={waypoints}"
        f"&mode=walking"
        f"&alternatives=true"
        f"&key={GOOGLE_MAPS_API_KEY}"
    )

    # print(directionsURL)

    response = requests.get(directionsURL)
    routeData = response.json()
    
    # if routeData["status"] == "OK":
    #     return jsonify(routeData)
    # else:
    #     return jsonify({"error": "Failed to fetch directions", "details": routeData}), 500
    
    if routeData["status"] == "OK":
        return jsonify({
            "routes": routeData["routes"],
            "sensorsAqi": sensorsAQICalculation(data)
        })
    else:
        return jsonify({"error": "Failed to fetch directions", "details": routeData}),
    
if __name__ == "__main__":
    app.run(debug=True, port=5002)