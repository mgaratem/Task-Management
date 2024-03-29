<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="500">

<p align="center"> API RESTful based on PHP Laravel 9 🐘</p>

<hr>

## Environment

Create a `.env` file with all needed params specified in `.env.example`

## Install and run locally

- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders.
- Run `php artisan serve`

## Install and run in a Docker container

- Run `make build`
- Run `make up`