# FinFriend - Personal Finance Tracker

A modern, dark-themed personal finance management application built with Laravel. Track your income, expenses, and financial health.

## Features

- Financial Dashboard with income/expense overview
- Add and manage transactions
- Modern dark theme interface
- Responsive design
- Category organization

## Tech Stack

- **Backend**: Laravel 9.52.20, PHP 8.0.30
- **Database**: MySQL
- **Frontend**: Bootstrap 5, Custom CSS
- **Icons**: Font Awesome

## Quick Start

1. **Clone and install**
   ```bash
   git clone <repository-url>
   cd finfriend
   composer install
   ```

2. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure database in `.env`**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=finfriend
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

4. **Run migrations and seed data**
   ```bash
   php artisan migrate
   php artisan db:seed --class=UserSeeder
   ```

5. **Start the server**
   ```bash
   php artisan serve
   ```

6. **Visit** `http://127.0.0.1:8000/transactions`

## Usage

- **Dashboard**: View total income, expenses, and balance
- **Add Transaction**: Click "New Transaction" to record income/expense
- **View History**: See all transactions in the table below

## Project Structure

```
app/
├── Http/Controllers/TransactionController.php
├── Models/Transaction.php, User.php
├── Services/TransactionService.php
└── Repositories/EloquentTransactionRepository.php

resources/views/
├── layouts/app.blade.php
└── transactions/index.blade.php, create.blade.php

database/
├── migrations/
└── seeders/UserSeeder.php
```

## License

MIT License
