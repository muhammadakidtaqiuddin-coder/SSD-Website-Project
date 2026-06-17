# 🚗 SSD Car Rental — Secure Web Application

[![Laravel](https://img.shields.io/badge/Laravel-13.x-red?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-blue?logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.x-38bdf8?logo=tailwindcss)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

---

## 📋 1. Project Description

**SSD Car Rental** is a full-stack web application developed as part of the **Secure Software Development (SSD)** coursework at Universiti Kuala Lumpur (UniKL). The system allows customers to browse, book, and manage car rentals online, while providing administrators with a secure dashboard to manage vehicles, bookings, and users.

The project was built with a **security-first mindset**, implementing industry-standard secure coding practices throughout the development lifecycle — from authentication and input validation to database access controls and session management.

**Key Functionalities:**
- User registration and secure login/logout
- Browse available cars with details (model, price, availability)
- Booking management for customers (create, view, cancel)
- Admin dashboard for managing cars, bookings, and users
- Role-based access control (Customer vs Admin)

**Tech Stack:** Laravel 13 · PHP 8.3 · Blade Templates · Tailwind CSS · Vite · SQLite/MySQL

---

## ⚙️ 2. Installation Steps

### Prerequisites

Before you begin, ensure you have the following installed:

| Tool | Minimum Version |
|------|----------------|
| PHP | 8.4+ |
| Composer | 2.x |
| Node.js | 18+ |
| npm | 9+ |
| Git | Any |
| MySQL / SQLite | Any |

### Step-by-Step Installation

**1. Clone the Repository**
```bash
git clone https://github.com/muhammadakidtaqiuddin-coder/SSD-Website-Project.git
cd SSD-Website-Project
```

**2. Install PHP Dependencies**
```bash
composer install
```

**3. Install Node.js Dependencies**
```bash
npm install
```

**4. Set Up Environment File**
```bash
cp .env.example .env
```

**5. Generate Application Key**
```bash
php artisan key:generate
```

**6. Configure the Database**

Open `.env` and update the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ssd_car_rental
DB_USERNAME=root
DB_PASSWORD=
```

> 📁 The database file (ssd_project.sql) is located in the database/ folder


**7. Run Database Migrations**
```bash
php artisan migrate
```

**8. (Optional) Seed Sample Data**
```bash
php artisan db:seed
```

**9. Build Frontend Assets**
```bash
npm run build
```

> Or use the automated setup script:
> ```bash
> composer run setup
> ```

---

## 🔒 3. Security Features Summary

This application incorporates the following security controls aligned with **OWASP Top 10** mitigation strategies:

### 🔐 Authentication & Session Management
- **Laravel Breeze** used for authentication scaffolding with secure login, registration, password reset, and email verification
- Passwords are hashed using **bcrypt** (via Laravel's `Hash` facade) — never stored in plaintext
- Session tokens are regenerated upon login to prevent **session fixation** attacks
- HTTPS-ready with secure cookie flags (`SESSION_SECURE_COOKIE=true` in production)

### 🛡️ CSRF Protection
- All state-changing forms include Laravel's **CSRF token** (`@csrf` Blade directive)
- Laravel's `VerifyCsrfToken` middleware automatically validates tokens on every POST/PUT/DELETE request

### 🧹 Input Validation & Sanitization
- All user input is validated using Laravel's **Form Request Validation** classes before processing
- Validation rules enforce type, length, and format constraints (e.g. `required|string|max:255|email`)
- Blade templates automatically **escape output** using `{{ }}` syntax, preventing **XSS (Cross-Site Scripting)**

### 🗄️ SQL Injection Prevention
- All database queries use **Laravel Eloquent ORM** and the **Query Builder** with parameterized queries — raw SQL is avoided
- No user input is directly interpolated into database queries

### 👤 Role-Based Access Control (RBAC)
- **Middleware** enforces access restrictions based on user roles (Admin vs Customer)
- Admin routes are protected and inaccessible to unauthenticated or unauthorized users
- Route model binding ensures users can only access their own resources

### 📋 Mass Assignment Protection
- Eloquent models define `$fillable` arrays to whitelist only permitted fields, preventing **mass assignment vulnerabilities**

### 🔑 Environment & Secret Management
- Sensitive credentials (DB passwords, app keys) are stored in `.env` files, excluded from version control via `.gitignore`
- `.env.example` provides a template without actual secrets

### 🚦 Rate Limiting
- Laravel's built-in **rate limiter** is applied to authentication routes to mitigate **brute-force attacks**

---

## ▶️ 4. How to Run the App

### Development Mode

Run the full development stack (server + queue + Vite HMR) with a single command:

```bash
composer run dev
```

This concurrently starts:
- `php artisan serve` — Laravel development server at `http://127.0.0.1:8000`
- `php artisan queue:listen` — Background job queue worker
- `npm run dev` — Vite frontend asset compiler with hot reload

### Or run individually:

```bash
# Terminal 1 — Backend
php artisan serve

# Terminal 2 — Frontend
npm run dev
```

Then open your browser at: **http://127.0.0.1:8000**

### Production Build

```bash
npm run build
php artisan optimize
php artisan serve
```

---

## 📦 5. Dependencies

### PHP / Backend (composer.json)

| Package | Version | Purpose |
|---------|---------|---------|
| `laravel/framework` | ^13.7 | Core Laravel MVC framework |
| `laravel/tinker` | ^3.0 | REPL for artisan commands |
| `laravel/breeze` | ^2.4 | Lightweight authentication scaffolding |
| `fakerphp/faker` | ^1.23 | Fake data generation for seeding |
| `laravel/pint` | ^1.27 | PHP code style fixer |
| `phpunit/phpunit` | ^12.5 | Testing framework |
| `nunomaduro/collision` | ^8.6 | Improved error reporting |
| `mockery/mockery` | ^1.6 | Mocking library for tests |

### JavaScript / Frontend (package.json)

| Package | Purpose |
|---------|---------|
| `tailwindcss` | Utility-first CSS framework |
| `vite` | Frontend build tool and dev server |
| `@vitejs/plugin-laravel` | Vite + Laravel integration |
| `postcss` | CSS transformation pipeline |
| `autoprefixer` | Adds vendor prefixes to CSS |

### System Requirements

| Requirement | Version |
|-------------|---------|
| PHP | >= 8.3 |
| Composer | >= 2.0 |
| Node.js | >= 18.0 |
| Database | MySQL 8+ / SQLite 3+ |

---

## 📸 6. Screenshots

> **Note:** Replace the placeholder sections below with actual screenshots of your running application.

### Login Page

<img width="1213" height="880" alt="image" src="https://github.com/user-attachments/assets/36338b02-1a59-49f0-a8ef-b0c723d47569" />
<img width="1175" height="880" alt="image" src="https://github.com/user-attachments/assets/0778cd20-60ba-4923-86d1-c7567e1eef89" />


*Secure login form with CSRF protection and input validation.*

### Home / Car Listing Page

<img width="1628" height="922" alt="image" src="https://github.com/user-attachments/assets/bdfe4e59-5d4e-421a-aa5a-d9d0367640eb" />

*Displays available cars with details, pricing, and availability status.*

### Booking Form

<img width="1138" height="844" alt="image" src="https://github.com/user-attachments/assets/2a6aa74d-3062-463f-b084-48776089983f" />


*Validated booking form with date selection and car confirmation.*

### Customer Dashboard

<img width="1627" height="904" alt="image" src="https://github.com/user-attachments/assets/793225c8-fcf0-4f5f-b3a9-595e2b5f0bbb" />


*Users can view, manage, and cancel their active bookings.*

### Admin Dashboard

<img width="1618" height="438" alt="image" src="https://github.com/user-attachments/assets/816bbffb-7126-41cd-87d3-b81fdef28f24" />
<img width="1581" height="881" alt="image" src="https://github.com/user-attachments/assets/e580f3bd-6f2f-4f97-a13c-b6b4bddd0e06" />
<img width="1580" height="877" alt="image" src="https://github.com/user-attachments/assets/61e3db93-48df-4894-94c9-b6c568a5d813" />
<img width="1590" height="877" alt="audit-logs" src="https://github.com/user-attachments/assets/e694ece6-c78e-4cc2-b77d-bd9587f8649d" />


*Admin can manage all cars, view all bookings, and handle user accounts.*

---

## 👥 Contributors

| Name | Role |
|------|------|
| Muhammad Akid Taqiuddin bin Dzul Izzudin | Developer / Project Lead |
| Khairul'Anam bin Mohammad Fairuze | Security Checker |
| Muhammad Ammar Fadhli bin Noor Anim | GitHub Handler |

---

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).

---

> **Course:** Secure Software Development (SSD) · Universiti Kuala Lumpur (UniKL)
