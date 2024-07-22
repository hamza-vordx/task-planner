#  Planning Web Application

This is a Laravel-based web application that fetches to-do task information from two separate providers and assigns them to the development team on a weekly basis. The application displays the weekly task schedule for each developer and the minimum number of weeks required to complete all tasks.

## Requirements

- PHP 7.4 or higher
- Composer
- Laravel 8 or higher
- MySQL or any other supported database

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/todo-planning.git
   cd todo-planning

2. **Install dependencies:**
   ```bash
   composer install   
3. **Set up environment variables:**
   Copy the example environment file and set up your environment variables.
    ```bash
   cp .env.example .env

4. **Generate application key:**
    ```bash
   php artisan key:generate

5. **Database Config :**
    pls add the config the database in the .env file
    ```bash
       DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=planner
        DB_USERNAME=root
        DB_PASSWORD=
6. **Run database migrations:**
    ```bash
      php artisan migrate

7. **Run database seeders :**
    ```bash
      php artisan db:seed
8. **Run the command to fetch tasks from providers:**
This command fetches tasks from the providers and saves them into the database.
    ```bash
         php artisan fetch:tasks
9. Serve the application:
    ```bash
         php artisan serve

## Accessing the Application
1. Access the web interface
   Open your browser and navigate to http://127.0.0.1:8000 to view the task schedules.

## Application Structure

1. app/Console/Commands/FetchTasks.php: Command to fetch tasks from the APIs and save them to the database.
2. app/Http/Controllers/Api/TaskController.php: Controller to handle API requests.
3. app/Http/Controllers/TaskController.php: Controller to handle web requests and display the schedules.
4. app/Models/Developer.php: Developer model.
5. app/Models/Task.php: Task model.
6. app/Services/ProviderFactory/ProviderFactory.php: Factory to handle different task providers.
7. app/Services/Provider/ProviderInterface.php: Interface for task providers.
8. app/Services/FiverTestProvider.php: Implementation of Provider1.
9. app/Services/UpworkTestProvide.php: Implementation of Provider2.
