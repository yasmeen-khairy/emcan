<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Project Initialization

To get started with this project, follow these steps:
1. composer install

2. set up your .env 

3. Run Migrations
   Migrate the database to set up the necessary tables:
   ```bash
   php artisan migrate
   php artisan db:seed

4. run project 
   ```bash 
   php artisan serve

5. Start the Queue Worker
   ```bash
    php artisan queue:work
 - change 'MAIL_USERNAME' and 'ADMIN_EMAIL' in .env to your gmail account to receive applications .
 - change 'MAIL_PASSWORD' to your gmail password or generate app password from google account .
 - change 'your_gmail_address@gmail.com' to DEFAULT GMAIL ACCOUNT 

 # Project skills 
- **PHP**: Server-side scripting language used to build the application.
- **Laravel**: PHP framework for developing the web application.
- **SMTP**: Email sending configuration using SMTP.
- **Queues**: Background job processing for tasks like sending emails asynchronously.
- **Jobs**: Laravel's job system used for handling time-consuming tasks .
.....
## Demo Video
https://github.com/user-attachments/assets/e6afd745-f483-4c74-8972-a94d841483db

