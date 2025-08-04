# FinFriend - Personal Finance Tracker

A modern, dark-themed personal finance management application built with Laravel. Track your income, expenses, and financial health with a clean, intuitive interface.

## Features

- **Financial Dashboard** - Overview of total income, expenses, and net balance
- **Transaction Management** - Add, view, and categorize financial transactions
- **Modern Dark Theme** - Sleek, professional interface with excellent readability
- **Responsive Design** - Works seamlessly on desktop and mobile devices
- **Real-time Calculations** - Automatic computation of financial summaries
- **Category Organization** - Organize transactions by custom categories

## Technology Stack

- **Backend**: Laravel 9.52.20
- **Database**: MySQL
- **Frontend**: Bootstrap 5, Font Awesome Icons
- **Styling**: Custom CSS with CSS Variables
- **PHP Version**: 8.0.30

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL database
- Web server (Apache/Nginx) or PHP built-in server

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd finfriend
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   - Configure your database connection in `.env`
   - Run migrations:
   ```bash
   php artisan migrate
   ```

5. **Seed the database with test users**
   ```bash
   php artisan db:seed --class=UserSeeder
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open your browser and navigate to `http://127.0.0.1:8000`
   - Visit `/transactions` to see the main dashboard

## Project Structure

```
finfriend/
├── app/
│   ├── Http/Controllers/
│   │   └── TransactionController.php
│   ├── Models/
│   │   ├── Transaction.php
│   │   └── User.php
│   ├── Repositories/
│   │   ├── Eloquent/
│   │   │   └── EloquentTransactionRepository.php
│   │   └── TransactionRepositoryInterface.php
│   └── Services/
│       └── TransactionService.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── UserSeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── transactions/
│           ├── index.blade.php
│           └── create.blade.php
└── routes/
    └── web.php
```

## Architecture

### Clean Architecture Implementation

The application follows clean architecture principles with clear separation of concerns:

- **Controllers** - Handle HTTP requests and responses
- **Services** - Contain business logic and orchestrate operations
- **Repositories** - Abstract data access layer with interface contracts
- **Models** - Eloquent models for database interactions

### Key Components

- **TransactionController** - Manages transaction CRUD operations
- **TransactionService** - Business logic for financial operations
- **EloquentTransactionRepository** - Database operations implementation
- **TransactionRepositoryInterface** - Contract for data access layer

## Database Schema

### Users Table
- `id` (Primary Key)
- `name` (String)
- `email` (Unique String)
- `password` (Hashed String)
- `timestamps`

### Transactions Table
- `id` (UUID Primary Key)
- `user_id` (Foreign Key to Users)
- `description` (String)
- `amount` (Decimal)
- `date` (Date)
- `type` (Enum: 'income', 'expense')
- `category` (Nullable String)
- `timestamps`

## Usage

### Adding Transactions

1. Navigate to the transactions page
2. Click "New Transaction" button
3. Fill in the transaction details:
   - Transaction Type (Income/Expense)
   - Description
   - Amount
   - Date
   - Category (optional)
4. Click "Save Transaction"

### Viewing Financial Summary

The dashboard displays:
- Total Income
- Total Expenses
- Net Balance
- Transaction count for each type

### Transaction History

View all transactions in a sortable table with:
- Description
- Amount (color-coded for income/expense)
- Transaction type badges
- Category tags
- Date

## Styling

### Design System

- **Color Palette**:
  - Primary Background: Dark grey (#1a1a1a)
  - Secondary Background: Medium grey (#2d2d2d)
  - Card Background: Light grey (#333333)
  - Accent Green: (#00d4aa) for income
  - Accent Red: (#ff6b6b) for expenses
  - Accent Blue: (#4ecdc4) for primary actions

- **Typography**: Inter font family for modern readability
- **Icons**: Font Awesome for consistent iconography
- **Responsive**: Bootstrap 5 grid system

### CSS Features

- CSS Variables for consistent theming
- Smooth transitions and hover effects
- Glassmorphism effects with backdrop blur
- Gradient backgrounds and buttons
- Responsive design patterns

## Development

### Adding New Features

1. **Create migrations** for database changes
2. **Update models** with new relationships/attributes
3. **Extend services** for business logic
4. **Update controllers** for new endpoints
5. **Create views** for user interface
6. **Add routes** in `web.php`

### Testing

```bash
php artisan test
```

### Code Style

Follow PSR-12 coding standards and Laravel conventions.

## Deployment

### Production Setup

1. Set `APP_ENV=production` in `.env`
2. Configure production database
3. Run `php artisan config:cache`
4. Set up web server (Apache/Nginx)
5. Configure SSL certificate
6. Set up backup strategy

### Environment Variables

Key environment variables to configure:
- `DB_CONNECTION`
- `DB_HOST`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `APP_DEBUG`
- `APP_ENV`

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please open an issue in the repository or contact the development team.

## Changelog

### Version 1.0.0
- Initial release
- Basic transaction management
- Financial dashboard
- Dark theme implementation
- User management system
- Clean architecture implementation
