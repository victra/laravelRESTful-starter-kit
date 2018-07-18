<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>

## About Laravel Backend Starter Kit

Laravel Backend Starter Kit is a project created by codedoct developer, that use for easyly create a project backend with laravel.

## Feature
1. Auth with RBAC (Role Base Access Controll)
2. Error handling
3. Doctrine migration
4. Support payment with midtrans
5. Support notification and chat with Firebase
6. Storage file with AWS

## Instalation
Create .env file from .env.example file.

Build the composer:


	$ composer require brozot/laravel-fcm


Fill project information like DB, AWS key, mailtrap, etc to .env file

Migration Database:


	$ php artisan doctrine:migration:diff
	$ php artisan doctrine:migration:migrate


Seeding Database:


	$ php artisan db::seed



## How to use


