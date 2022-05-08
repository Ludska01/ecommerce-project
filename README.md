## About this project 
This is my first project of this scale until now i did some smaller projects and this is the combination of that accumulated knowledge.
I tried to keep everything as organised as possible.

## Features:

- time limited coupons
- order tracking 
- wishlist 
- automail for confirmation of recived order
- admin panel
- blog 
- rewiews 
- multiimg
- recipe

## Instalation

If you decide to run this project on your pc, in the .env file set the database that shuld be used then 
in project folder run this commands:

- composer install
- php artisan key:generate 
- php artisan migrate --seed
- php artisan serve

after this you will have only one admin in your database(you will be able to add more later),and you are ready to login with admin

- admin@gmail.com
- password

on page /admin/login.

Please fill in brands and categories and add some products.you also have sql_insert folder with dummy data for site.

Now you are ready to use the frontend.

If you want to get mails you shuld set that also in .env file.

For stripe payment use dummy card 4242 4242 4242 4242 any cv code and future exp date.

## This project uses:

- laravel 8
- laravel 8 jetsream
- composer
- bumbum99 cart package
- barryvdh html to pdf converter
- toastr messages
- sweet alerts
- stripe payment
- bootstrap
- lightbox
- font awesome icons
- data feather icons



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
