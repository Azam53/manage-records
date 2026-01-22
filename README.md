# Laravel Admin Panel – Product Management System

## Overview
This project is a Laravel-based admin panel implementing authentication, role-based access control, and product management with optimized search and clean architecture.

---

## Architecture Decisions
The application follows a layered architecture:

- Controllers are kept thin.
- Business logic is handled via Service classes.
- Database access is abstracted using the Repository pattern.
- Dependency Injection is used for flexibility and testability.

This structure improves maintainability, scalability, and test coverage.

---

## Features
- Authentication with Laravel Breeze
- Role-based access (Admin / User)
- Product CRUD (Title, Description, Price, Available Date)
- Server-side validation
- Search with database indexing
- Pagination
- Admin dashboard UI

---

## Security Considerations
- CSRF protection via Laravel middleware
- SQL Injection prevention using Eloquent ORM
- XSS protection via Blade auto-escaping
- Authorization enforced using middleware

---

## Performance Optimizations
- Indexed product title column
- Optimized search queries
- Pagination to prevent large result sets
- No expensive text-field searches

---

## Challenges & Solutions
- **Role-based routing:** Solved using custom middleware.
- **Search performance:** Solved via indexing and query scoping.
- **Clean architecture:** Implemented Repository + Service layers.

---

## Deployment
- **Can be done 2 ways via shell script or manually:**
For the shell script follow below command.
Run the following command to deploy the application:

```bash
./deploy.sh
````

## Manual Installation (via Git Clone)

- **Prerequisites** -

Ensure the following are installed:

PHP 8.2+

Composer

MySQL / MariaDB

Node.js 18+ and npm

Git

Step 1: Clone the Repository

Step 2: Install Backend Dependencies

Step 3: Environment Configuration

Step 4: Generate Application Key

Step 5: Install Frontend Dependencies
  
npm install
npm run build

For Development

npm run dev


Step 6: Run Database Migrations

php artisan migrate

Step 7: Start the Application

php artisan serve

Step 8: Create an Admin User (Optional)


## Admin Access

/admin/dashboard


### Admin Seeder
An admin user can be created automatically using:

```bash
php artisan db:seed --class=AdminUserSeeder

`````

