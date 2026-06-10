# SSD Website Project

A full-stack web application built with the **Laravel 13** framework, featuring a modern frontend powered by **Tailwind CSS**, **Alpine.js**, and **Vite**.

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend Framework | Laravel 13 (PHP ^8.3) |
| Authentication | Laravel Breeze |
| Frontend Styling | Tailwind CSS v3 + @tailwindcss/forms |
| Frontend JS | Alpine.js v3 |
| Build Tool | Vite 8 + laravel-vite-plugin |
| HTTP Client | Axios |
| Database | MySQL (`ssd_project`) |
| Session/Cache/Queue | Database driver |
| Testing | PHPUnit 12 |

---

## 📁 Project Structure

```
SSD-Website-Project/
├── app/                # Application core (Models, Controllers, Middleware, etc.)
├── bootstrap/          # Framework bootstrapping files
├── config/             # Application configuration files
├── database/           # Migrations, seeders, and factories
├── public/             # Publicly accessible files (entry point: index.php)
├── resources/          # Blade views, CSS, and JS assets
├── routes/             # Route definitions (web.php, api.php, etc.)
├── storage/            # Logs, caches, and uploaded files
├── tests/              # Feature and unit tests
├── .env.example        # Environment variable template
├── artisan             # Laravel CLI tool
├── composer.json       # PHP dependencies
├── package.json        # Node.js dependencies
├── tailwind.config.js  # Tailwind CSS configuration
├── vite.config.js      # Vite bundler configuration
└── postcss.config.js   # PostCSS configuration
```

---

## ⚙️ Requirements

- **PHP** >= 8.3
- **Composer**
- **Node.js** & **npm**
- **MySQL** database

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/muhammadakidtaqiuddin-coder/SSD-Website-Project.git
cd SSD-Website-Project
```

### 2. Quick setup (one command)

```bash
composer run setup
```

This will automatically:
- Install PHP dependencies (`composer install`)
- Copy `.env.example` to `.env`
- Generate the application key
- Run database migrations
- Install Node.js dependencies
- Build frontend assets

### 3. Manual setup (step by step)

```bash
# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env
# DB_DATABASE=ssd_project
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Run database migrations
php artisan migrate

# Install Node.js dependencies
npm install

# Build frontend assets
npm run build
```

---

## 🔧 Environment Configuration

Key variables in your `.env` file:

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ssd_project
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database
```

---

## 🧑‍💻 Development

Start all development services at once:

```bash
composer run dev
```

This concurrently runs:
- PHP development server (`php artisan serve`)
- Queue listener (`php artisan queue:listen`)
- Vite dev server with HMR (`npm run dev`)

Or run them individually:

```bash
php artisan serve       # Start the web server
npm run dev             # Start Vite HMR dev server
```

---

## 🧪 Running Tests

```bash
composer run test
# or
php artisan test
```

Tests are written using **PHPUnit 12** and located in the `tests/` directory.

---

## 📦 Key Dependencies

### PHP (Composer)

| Package | Version | Purpose |
|---|---|---|
| `laravel/framework` | ^13.7 | Core framework |
| `laravel/tinker` | ^3.0 | REPL for Laravel |
| `laravel/breeze` | ^2.4 | Authentication scaffolding |
| `laravel/pint` | ^1.27 | PHP code style fixer |
| `fakerphp/faker` | ^1.23 | Fake data generation |
| `phpunit/phpunit` | ^12.5 | Testing framework |

### JavaScript (npm)

| Package | Version | Purpose |
|---|---|---|
| `tailwindcss` | ^3.1 | Utility-first CSS framework |
| `alpinejs` | ^3.4 | Lightweight JS reactivity |
| `vite` | ^8.0 | Frontend build tool |
| `axios` | ^1.16 | HTTP requests |
| `laravel-vite-plugin` | ^3.1 | Laravel + Vite integration |

---

## 🌐 Languages Used

- **Blade** — 49.3% (templating)
- **PHP** — 24.8% (backend logic)
- **JavaScript** — 20.8% (frontend interactivity)
- **CSS** — 5.1% (styling)

---

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🙋 Contributing

Contributions, issues and feature requests are welcome. Feel free to open a pull request or issue on [GitHub](https://github.com/muhammadakidtaqiuddin-coder/SSD-Website-Project).
