# Fresh Step

**Fresh Step** is a Laravel-based application designed to provide users with optimised running routes that minimise pollution exposure. By leveraging data from the pulse.eco API, the app ensures that users can enjoy healthier, more eco-friendly running experiences. Fresh Step delivers real-time, pollution-aware recommendations tailored to your needs.

---

## Getting Started

Follow the steps below to set up both the Python backend API and the Laravel application.

---

## Installation

Download the project or clone in to your local machine

```bash
git clone https://github.com/athanasiya/freshstep.git
```

Navigate to project folder

```bash
cd "project name"
```

## Python Backend API Setup

The Python algorithm is located in the `api` folder. Follow these steps to set it up:

1. **Navigate to the API Directory:**

   ```bash
   cd api
   ```

2. **Run the Algorithm Script:**

   Execute the following command to start the Python backend server:

   ```bash
   python algorithm.py
   ```

3. **Server Details:**

   The Python server will run on port 5002. You can access it at:

   ```bash
   http://127.0.0.1:5002
   ```

## Laravel Application Setup

The Laravel application is located in the web_app folder. Follow these steps to set it up:

1. **Navigate to the Laravel Directory:**

   ```bash
   cd web_app
   ```

2. **Install Laravel Dependencies:**

   ```bash
   composer install
   ```

3. **Install JavaScript Dependencies:**

   ```bash
   npm install
   ```

4. **Compile Frontend Assets**

   ```bash
   npm run dev
   ```

5. **Set Up the Environment File:**

   ```bash
   cp .env.example .env
   ```

6. **Database Configuration:**

   Update the .env file with your database credentials. For example:

   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=codefu
    DB_USERNAME=root
    DB_PASSWORD=root
   ```

7. **API Integration:**

   Insert the Python API URL into the /route endpoint in the .env file:

   ```bash
   PYTHON_API_URL=http://127.0.0.1:5002/route
   ```

8. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

9. **Start the Development Server:**

   ```bash
   php artisan serve
   ```

   The Laravel application will be available at:

   ```bash
   http://127.0.0.1:8000
   ```

## Notes

Ensure both the Python API and Laravel server are running simultaneously for full functionality.
