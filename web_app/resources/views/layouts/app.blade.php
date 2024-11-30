<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <script defer type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx9mFGBRNOqXB7-1K_4ciASdJK_fH6IJo&libraries=geometry"></script>
    <link rel="icon" href="images/ScribbleLoop.png" type="image/x-icon">
</head>
<body style="font-family: 'Switzer';" class="bg-[#F6F6F6]">
    @yield('content')
</body>
</html>
