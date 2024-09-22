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
terminal :
   $ git clone -b dev https://github.com/your-username/your-laravel-app.git 

2. **Move to folder:**
terminal :
   $ cd hartoyo-electronic

4. **Setup .ENV :**
   - rename file .env.example to .env 
   - open and change database configuration. example :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=electronic
DB_USERNAME=root
DB_PASSWORD=     

5. **Migrate Database:**
terminal :
   php artisan migrate

6. **Run Laravel:**
    php artisan serve

 **Note:**
 DEFAULT PORT : 8000