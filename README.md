Laravel Admin Panel
This project is a backend admin panel built with the Laravel Framework. It provides basic authentication and CRUD (Create, Read, Update, Delete) functionality for Factories and Employees. It also includes a REST API for external applications and automated tests for core features.

Installation
Follow these steps to set up the project on your local machine.

Prerequisites
PHP >= 8.2

Composer

Node.js & npm

A database (e.g., MySQL, SQLite)

Step-by-Step Setup
Clone the repository:

git clone https://github.com/Val-cast2000/factory-management.git
cd factory-management

Install PHP dependencies:

composer install

Install JavaScript dependencies and compile assets:

npm install
npm run dev

Copy the .env.example file and rename it to .env.

cp .env.example .env

Configure the database connection in the .env file. For example, for MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

Generate the application key:

php artisan key:generate

Run the database migrations and seeds for the default admin user:

php artisan migrate --seed

This command will create the tables for factories, employees, and a default user.

Admin Access
You can log in to the admin panel using the following credentials:

Email: admin@admin.com

Password: password

Features
Admin Panel (Backend)
Authentication: Basic login functionality using Laravel Breeze. Registration is disabled.

CRUD for Factories: Manage factories via the web interface.

CRUD for Employees: Manage employees. Each employee has a foreign key to a factory.

Pagination: Factory and employee lists are paginated, with 10 entries per page.

REST API
API Endpoints:

/api/factories

/api/factories/{id}

/api/employees

/api/employees/{id}

Authentication: The API is protected by Laravel Sanctum.

Relationships: Employee data can be pulled with the associated factory's information.

Automated Testing
You can run the automated tests for the project to ensure proper functionality.

php artisan test

How to Contribute
If you want to add features or fix bugs, follow the standard git flow.