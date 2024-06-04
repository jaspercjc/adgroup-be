# IP Address Management Solution - BE

This is the front end of the project.

[Frontend](https://github.com/jaspercjc/adgroup-fe) - for the frontend.

## Project Setup

Important: the FE and the BE should be served on the same domain.

You can setup using a subdomain for example: the BE on api.project.test and the FE on project.test.

Or using different ports like localhost:3000 on FE and localhost:8000 on BE

### Environment Variables

Create your own .env file, you can copy the values from .env.example and modify as you see fit.

Make sure to add the frontend domain to the SANCTUM_STATEFUL_DOMAINS value

## Install Dependencies

```sh
composer install
```

## Generate Key

```sh
php artisan key:generate
```

## Database Migration

```sh
php artisan migrate
```

### Compile and Serve for Development

```sh
php artisan serve
```
