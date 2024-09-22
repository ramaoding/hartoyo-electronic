# Laravel Application

## Overview

This is a Laravel-based web application that provides Product and Orders Api for Hartoyo electronic. 

## Features

- CRUD API for Product and Orders

## Requirements

- PHP >= ^8.0
- Composer
- MySQL
- Laravel 11.x

## Installation

1. **Clone the repository:**
   $ git clone -b dev https://github.com/your-username/your-laravel-app.git 

2. **Move to folder:**
   $ cd hartoyo-electronic

4. **Setup .ENV :**
   - $ cp .env.example .env
   - open and change database configuration. example :
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=electronic
   DB_USERNAME=root
   DB_PASSWORD=     

5. **Generate the application key:**
   $ php artisan key:generate

5. **Migrate Database:**
terminal :
   $ php artisan migrate

6. **Run Laravel:**
   $ php artisan serve

Your application should now be running at http://localhost:8000.