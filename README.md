# H3kHire

A full-stack web application project for secure programming built with Laravel backend, modern frontend, and comprehensive database schema.

## Project Overview

SecProg is a freelancing/job marketplace platform designed with security best practices in mind. The project demonstrates secure programming concepts across multiple layers of the application stack.

## Project Structure

```
project-secprog/
├── Alur/                    # Application workflow documentation
├── Database/                # Database migrations and schema
│   ├── create_table.sql    # SQL schema definitions
│   └── *.php               # Laravel migration files
├── HTML/                    # Frontend static HTML templates and assets
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   ├── images/             # Image assets
│   ├── fonts/              # Font files
│   └── *.html              # HTML pages
├── web/                     # Laravel backend application
│   ├── app/                # Application logic (models, controllers)
│   ├── config/             # Configuration files
│   ├── database/           # Migrations and seeders
│   ├── public/             # Public-facing files
│   ├── resources/          # Views and assets
│   ├── routes/             # API routes
│   ├── tests/              # Test suite
│   ├── composer.json       # PHP dependencies
│   ├── package.json        # JavaScript dependencies
│   ├── vite.config.js      # Build tool configuration
│   └── artisan             # Laravel CLI
├── Web-API/                # API documentation and tests
│   └── secprog.postman_collection.json  # Postman API collection
└── Weekly Progress Report/ # Development progress documentation
```

## Technology Stack

### Backend
- **Framework**: Laravel
- **Language**: PHP
- **Build Tool**: Vite
- **Styling**: Tailwind CSS

### Frontend
- **HTML/CSS/JavaScript**: Vanilla with Bootstrap integration
- **Build System**: Vite
- **Styling**: Bootstrap, Tailwind CSS
- **Font Awesome**: Icon library

### Database
- **System**: MySQL
- **Migrations**: Laravel migrations (PHP)

## Setup Instructions

### Prerequisites
- PHP (compatible with Laravel)
- Composer
- Node.js and npm
- MySQL server
- XAMPP or similar local development environment

### Installation

1. **Clone/Setup the project**
   ```bash
   cd c:\xampp\htdocs\project-secprog\web
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Setup environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   - Update `.env` with your MySQL credentials
   - Run migrations:
   ```bash
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run dev      # Development with hot reload
   npm run build    # Production build
   ```

7. **Start the application**
   ```bash
   php artisan serve
   ```

## Running with XAMPP
### Quick Start with XAMPP

1. **Start XAMPP Control Panel**
   - Open XAMPP Control Panel (usually in your Start menu or `c:\xampp\xampp-control.exe`)
   - Click **Start** on both **Apache** and **MySQL** modules

2. **Verify Services**
   - Both Apache and MySQL should show as "Running" (highlighted in green)

3. **Run These Commands**
    (If this is your first time deploying it)
   ```bash
   composer install
   ```

   ```bash
   php artisan migrate:fresh --seed
   ```

### Using PHP Built-in Server (Development)

1. Run the command below
   ```bash
   php artisan serve
   ```

3. Access the application at: `http://localhost:8000`

### Troubleshooting

- **Port conflicts**: If port 8000 is in use, Laravel will suggest an alternative
- **Database connection error**: Ensure MySQL is running and credentials in `.env` are correct
- **Permission errors**: Ensure `storage/` and `bootstrap/cache/` directories are writable
- **Assets not loading**: Run `npm run build` for production assets or `npm run dev` for development

## Features

### Core Functionality
- **Job Listings**: Browse and manage job postings
- **Freelancer Profiles**: View freelancer details and portfolios
- **Project Management**: Post and track projects
- **Company Listings**: View company information
- **User Authentication**: Secure login and registration

### Pages Included
- Home/Index pages
- Job listings (multiple layout options)
- Freelancer directory
- Project marketplace
- Company profiles
- Blog section
- Contact and support
- Login/Sign-up
- Pricing and testimonials
- Privacy policy and terms of service

## API Documentation

The API endpoints are documented in the Postman collection located at:
```
Web-API/secprog.postman_collection.json
```

Import this file into Postman to explore available endpoints.

## Database

Database schema and migrations are located in:
- `Database/create_table.sql` - SQL schema
- `Database/2025_10_06_000000_create_secprog_schema_*.php` - Laravel migrations

Run migrations using:
```bash
php artisan migrate
```

## Development

### Available Scripts

From the `web/` directory:

```bash
npm run dev      # Start development server with Vite
npm run build    # Build production assets
php artisan serve   # Start Laravel development server
```

### Project Layout Options

The HTML templates include multiple layout variations:
- **3-column layouts**: Company, freelancer, job, and project listings
- **4-column layouts**: Wider grid displays
- **Sidebar layouts**: Left and right sidebar options
- **No sidebar**: Full-width layouts

## Security Notes

This project emphasizes secure programming practices:
- Input validation and sanitization
- SQL injection prevention through Laravel ORM
- CSRF protection
- Secure authentication mechanisms
- Database schema follows security best practices

## Progress Tracking

Weekly progress reports are available in:
```
Weekly Progress Report/
├── Week1Report.txt
├── Week2Report.txt
└── ...
```

## License

This project is intended for educational purposes demonstrating secure programming practices.

## Support

For issues or questions, refer to:
- `Alur/` directory for application workflow
- `NOTES.md` for project notes
- `Web-API/` for API documentation
- Weekly progress reports for development history

---

**Last Updated**: December 2025

**Maintained by aethrna and team**
