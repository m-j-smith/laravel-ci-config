# Laravel CI Config

A minimal GitHub Actions CI setup for Laravel projects.


## What's included

- **Test runner** via `php artisan test` using SQLite in-memory database (MySQL service not required). Compatible with both Pest and PHPUnit.

- **Laravel Pint** code style check using the `laravel` preset.

- **Separate jobs** so tests and style report independently.


## Required Project Config

- PHP 8.2+
- Laravel 12+

### `.env.example`

Ensure your `.env.example` includes:

```env
APP_KEY=
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

### `phpunit.xml`

Ensure the following are uncommented in the `<php>` section:

```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

## Installation

1. Install the package via Composer into your development dependencies:

```bash
composer require m-j-smith/laravel-ci-config --dev
```

2. Install the GitHub Actions CI workflow and Pint config into your project:

```bash
php artisan ci:install
```

This will add the following files to your project:

```
.github/
└── workflows/
    └── ci.yml
pint.json
```