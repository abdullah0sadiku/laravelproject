# Laravel Project

Welcome to the Laravel Project!  
This is a web application built with the Laravel PHP framework. The project demonstrates basic Laravel features such as authentication, CRUD operations, and database integration.



## Features

- User authentication (login/register)
- CRUD operations for posts
- Database integration with Eloquent ORM
- Simple and clean user interface

## Requirements

- PHP 8.0+
- Composer
- Node.js & npm
- MySQL or compatible database

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/abdullah0sadiku/laravelproject.git
   cd laravelproject
   ```

2. Install PHP dependencies:
   ```sh
   composer install
   ```

3. Install JavaScript dependencies:
   ```sh
   npm install
   ```

4. Copy `.env.example` to `.env` and configure your environment variables.

5. Generate application key:
   ```sh
   php artisan key:generate
   ```

6. Run migrations:
   ```sh
   php artisan migrate
   ```

7. Start the development server:
   ```sh
   php artisan serve
   ```

8. Compile assets:
   ```sh
   npm run dev
   ```

## Usage

- Access the application at [http://localhost:8000](http://localhost:8000)
- Register a new user or log in.
- Create, view, edit,
