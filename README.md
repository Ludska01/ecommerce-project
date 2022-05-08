## About this project 
This is my first project of this scale until now i did some smaller projects and this is the combination of that accumulated knowledge.
I tried to keep everything as organised as possible.
## Instalation

If you decide to run this project on your pc, in the .env file set the database that shuld be used then 
in project folder run this commands:

- composer install
- php artisan migrate --seed
- php artisan serve

after this you will have only one admin in your database(you will be able to add more later),and you are ready to login with admin

- admin@gmail.com
- password

on page /login/admin.

Please fill in brands and categories at least two of each and add at least one product from admin panel.
(I will fix this soon so you can use frontend even if nothing is added)

Now you are ready to use the frontend.

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
- font awesome icons
- data feather icons



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
