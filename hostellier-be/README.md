# Hostellier- Backend

This is the backend for the hostellier application.

### Usage

Always include the bearers token in your header for any request.

**Format:**

Authorization: `Bearer [access_token]`

**Sample:**

Authorization: `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjYwODVlZWRlN2M4`

### Admin Seeders

The deault credentials for the seeded admin after running `php artisan db:seed --class=AdminSeeder` is:

-   E-mail: `admin@gmail.com`
-   Password: `secret1234`

## Development Environment Setup

All developments changes should be submitted as PR to `master` branch.

### Built with

-   PHP
-   Laravel

### Requirements

-   Composer
-   `PHP > 7.1.*`

### Back-end Development Setup

-   Install Composer and [Laravel](https://laravel.com/docs/5.6)
-   Clone project: `https://github.com/TNkemdilim/flutterwave-hostellier.git`
-   Install dependencies: `composer install`
-   Create your `.env` file and use `.env.example` to configure the settings
-   Fill in your **API Keys** for supported social media (Facebook, Twitter & stripe, etc.)
-   Run `php artisan key:generate` to generate your **APP_KEY**
-   Run migrations to create the tables in the database: `php artisan migrate` or `php artisan migrate --seed` or `php artisan migrate:refresh --seed`
-   Run db:seed: `php artisan db:seed` to insert test data
-   Create the link to `public/storage/`by running `php artisan storage:link`
-   Generate all laravel passport keys by running the following commands successively.
    `php artisan passport:install`
    `php artisan passport:keys`
    `php artisan passport:client --password`

-   Run development server: `php artisan serve`
-   To see all routes, run `php artisan route:list`

### Notes

-   Please, do not track/commit build or local config files.
-   Create a new branches for stuff you're unsure of so **master** doesn't get messed up.
-   Try as much as possible to use [semantic commit messages](https://seesparkbox.com/foundry/semantic_commit_messages).
-   Write and run unit tests.
