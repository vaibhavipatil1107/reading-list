# Reading List App

A simple Laravel application for managing a personal reading list.

## Features

- View all books
- Add books with a title, author, and reading status
- Edit existing books
- Delete books with confirmation
- Filter books by reading status
- Validate user input

## Technologies Used

- PHP
- Laravel
- SQLite
- Blade
- HTML
- Git and GitHub

## Requirements

- PHP
- Composer
- Node.js and npm (if rebuilding frontend assets)

## Setup Instructions

1. Clone this repository.
2. Open a terminal in the project directory.
3. Install PHP dependencies:

   composer install

4. Create the environment file:

   Copy .env.example to .env

5. Generate the application key:

   php artisan key:generate

6. Create the SQLite database file if it does not exist, then configure DB_DATABASE in .env if needed.

7. Run database migrations:

   php artisan migrate

8. Start the development server:

   php artisan serve

9. Open http://127.0.0.1:8000 in your browser.

## AI Usage Disclosure

AI assistance was used to help understand Laravel concepts, implement features, troubleshoot errors, and prepare project documentation. The code was reviewed and tested during development.
