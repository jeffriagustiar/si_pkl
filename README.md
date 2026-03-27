# SI-PKL (Sistem Informasi Praktik Kerja Lapangan)

A web application designed to manage student internships (PKL) for Vocational High Schools (SMK). Built with Laravel 10 and Tailwind CSS.

## Features
- **Admin**: User management (CRUD) and mentor-student pairing.
- **Teacher**: Review student activities, provide feedback, and ratings.
- **Student**: Upload daily activities with photos, edit/delete pending logs, and receive notifications.

## Prerequisites
- PHP ^8.1
- Composer
- Node.js & NPM
- MySQL or PostgreSQL

## Installation & Configuration

1. **Clone the repository**:
   ```ps1
   git clone <repository-url>
   cd si_pkl
   ```

2. **Install PHP dependencies**:
   ```ps1
   composer install
   ```

3. **Install JS dependencies & Build assets**:
   ```ps1
   npm install
   npm run build
   ```

4. **Environment Setup**:
   Copy `.env.example` to `.env` and configure your database:
   ```ps1
   cp .env.example .env
   ```
   *Edit `.env` and set `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.*

5. **Generate App Key**:
   ```ps1
   php artisan key:generate
   ```

6. **Run Migrations & Seeders**:
   ```ps1
   php artisan migrate:fresh --seed
   ```
   *This will create the database tables and seed test accounts.*

7. **Create Storage Link**:
   ```ps1
   php artisan storage:link
   ```

8. **Run the application**:
   ```ps1
   php artisan serve
   ```

## Test Accounts
| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin@example.com` | `password` |
| **Teacher** | `teacher@example.com` | `password` |
| **Student** | `student@example.com` | `password` |

## License
Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
