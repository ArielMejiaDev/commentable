# Laravel & Vue Commentable app

## Description

It creates a simple comment system that works with an API and a monolith that works with VueJS components and InertiaJS (Both architecture works).
The comment system relies on polymorphic relationships and Gates to validate to some rules based on comment-parent types.
It creates a simple comment system with a very basic rule, Articles has comments, and comments has more comments as replies, but it support only a third level of nested comments.

## Installation

### Clone the project
```
git clone git@github.com:ArielMejiaDev/commentable.git
```

### Install Dependencies

In the root directory

```
cd commentable
```

Install all the backend and frontend dependencies:

```
composer install
npm install
```

### Compile the frontend assets

For local development environment

```
npm run dev 
```

For stage/production

```
npm run prod
```

### Create an ENV file

```
cp .env.example .env
```

### Generate an application key

```
php artisan key:generate
```

### Run migrations and seed the database (setup database and add fake data)

* Remember to set a MySQL database with the application name as `commentable`

```
php artisan migrate:fresh --seed
```

* If your environment does not have MySQL, you can use SQLite by creating a database file `database/database.sqlite` and setting `DB_CONNECTION=sqlite` 

### Run the project

In a MacOS with Valet environment: go to your browser to: `http://commentable.test`

In a machine with PHP 8.1, in the project root directory execute this command to run the artisan server:

```
php artisan serve
```

## Usage

The project has two different architectures, Monolith and REST API. 

## The Monolith
it was built as a monolith with VueJS components and an SPA in the frontend

You can check this project in the browser: `http//:commentable.test` there is a loom that explains this app behavior [Here](https://www.loom.com/share/4acd35382c3d4b9ba6ac4e4d37fa9272).

### The Application API

You can get the API documentation from: `http://localhost:8000/docs`

You can get the POSTMAN COLLECTION from `http://localhost:8000/docs/collection.json`

So you can start to test it locally, there is also a loom to explain the REST API behavior [Here](https://www.loom.com/share/4acd35382c3d4b9ba6ac4e4d37fa9272)

## Tests

You can run the application tests (phpUnit) by executing:

```php
php artisan test
```
