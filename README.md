# Laravel Admin Panel

This project is a backend admin panel built with the **Laravel Framework**.  
It provides basic **authentication**, **CRUD** (Create, Read, Update, Delete) functionality for **Factories** and **Employees**, a **REST API** for external applications, and **automated tests** for core features.

---

## 🛠 Installation

Follow these steps to set up the project on your local machine.

### 📋 Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- A database (e.g., MySQL, SQLite)

### ⚙️ Step-by-Step Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/Val-cast2000/factory-management.git
   cd factory-management

2. **Install PHP dependencies**
   ```bash
   composer install

3. **Install JavaScript dependencies and compile assets**
   ```bash
   npm install
   npm run dev

4. **Copy the .env file**
   ```bash
   cp .env.example .env

5. **Configure your database in .envConfigure your database in .env**
   ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password


6. **Generate the application key**
   ```bash
   php artisan key:generate

7. **Run migrations and seed the default admin user**
   ```bash
   php artisan migrate --seed

This will create tables for factories, employees, and a default admin user.

## 🔐 Admin Access

Login credentials for the admin panel:

- **Email:** `admin@admin.com`
- **Password:** `password`

---

## ✨ Features

### Admin Panel (Backend)

- 🔐 **Authentication**: Basic login functionality via Laravel Breeze (registration disabled)
- 🏭 **Factories CRUD**: Manage factories through the web UI
- 👷‍♂️ **Employees CRUD**: Manage employees with factory associations
- 📄 **Pagination**: 10 items per page

### REST API

- 🔌 **API Endpoints**:
  - `GET /api/factories`
  - `GET /api/factories/{id}`
  - `GET /api/employees`
  - `GET /api/employees/{id}`
- 🔒 **Protected** by Laravel Sanctum
- 🔗 **Factory ↔ Employee Relationship**: Employee data includes related factory info

---

## 🧪 Automated Testing

To run automated tests for the project:

```bash
php artisan test
```

This ensures that core functionalities are working properly.

---

## 🤝 How to Contribute

If you want to contribute:

1. Fork this repository.
2. Create a new feature or bugfix branch.
3. Make your changes and commit them.
4. Submit a pull request for review.

Please follow the standard Git flow and write clear commit messages.

---

## 📄 License

This project is open-source and available under the **MIT License**.
