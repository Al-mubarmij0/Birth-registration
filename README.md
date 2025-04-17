# Registration Management System

This project is a Laravel-based web application for managing student or individual registrations. It includes functionality for:
- Submitting registration forms
- Admin approval or rejection
- Generating printable certificates

## ⚙️ Technology Stack

- **Backend:** Laravel 10+ (PHP Framework)
- **Frontend:** Blade Templating, HTML5, CSS3
- **Database:** MySQL
- **Authentication:** Laravel built-in
- **Dev Tools:** Composer, Laravel Artisan, Tinker

## 🛠️ Requirements

- PHP >= 8.0
- Composer
- MySQL or compatible database
- Laravel 10+
- Node.js (for frontend asset building, optional)

## 🚀 Installation

1. Clone the repository:

```bash
git clone https://github.com/Al-mubarmij0/Birth-registration.git
cd Birth-registration
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy .env.example to .env and configure your database:

``` bash
cp .env.example .env
```
4. Generate application key:

``` bash
php artisan key:generate
```

5. Run migrations:

``` bash
php artisan migrate
```

6. (Optional) Build frontend assets:

``` bash
npm install && npm run dev
```

7. Serve the application:

```bash
php artisan serve
```
## 🔐 Admin Setup
To create an admin or any user manually (e.g. with email and password), use Laravel Tinker:
```bash
php artisan tinker
```
Then inside Tinker:
``` bash
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password123'),
]);
```
Replace the email and password with the desired values.

## 📄 Features
- Registration approval workflow (Pending → Approved/Rejected)
- Rejection reasons with form validation
- Certificate generation on one page with full registrant details
- Print-friendly layout
- Admin dashboard for viewing registration statuses
## 👥 Authors
github.com/Al-mubarmij0


## 📬 Contact
If you have any issues, suggestions, or collaboration requests, you can reach out via:

- Email: mohammedmubaraksani@gmail.com

- GitHub: github.com/Al-mubarmij0


