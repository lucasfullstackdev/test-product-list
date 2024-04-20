
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">Product Listing API</h1>
<h4 align="center">An API for applying discounts on products</h4>

## About the project
This project aims to attest to my knowledge in the following areas:

- Development of [Laravel](https://laravel.com/) applications
- Development of REST APIs using [Laravel](https://laravel.com/)
- ORM [Eloquent](https://laravel.com/docs/11.x/eloquent)
- [DDD](https://medium.com/cwi-software/domain-driven-design-do-in%C3%ADcio-ao-c%C3%B3digo-569b23cb3d47) Architecture
- Implementation of [Service Layer](https://davislevine.medium.com/service-design-patterns-930203c8df37)
- [Docker](https://www.docker.com/)
- [Laravel Sail](https://laravel.com/docs/11.x/sail)

## Why this project?
This project is part of my personal portfolio, a way to prove my knowledge in [Laravel 11x](https://laravel.com/).
Building APIs is part of a backend developer's routine, so this project served as a simulation of a real backend developer's routine.

## About the Database Modeling
The challenge consisted of building a Laravel REST API that allows for applying discounts.
For the challenge, the following tables were created:

| Table | Description |
| ------------| --- |
| products_category | Contains all product categories |
| products | Contains all products |

## Discounts Hierarchy
Considering that our applications need to be flexible and scalable, I decided to make some changes to the proposed challenge:

- The price column in the products table was initially defined as an integer, but in my view, this does not provide real benefits, but rather limits possible products with decimal values. Additionally, at some point in the future, it might be necessary to change the data type of this column, which could be cumbersome.
- Changes to the discount policy:
    - I removed the category-based discount rule from the code, so the system management could (in a likely future) implement its discount policy for each category.
    - I removed the SKU-based discount rule, now directly passing to a new column (discount) in the products table.

With the change in the discount policy, a new question arose: "Which discount prevails in case we have both a product discount and a category discount?" To solve this question, I defined that the product discount always takes precedence over the category discount, as it is a specific discount.


## Setup
1. Clone the repository
2. Access the project root.
3. Run the command:

```
$ composer install
```

```bash
$ composer require  laravel/sail  --dev
```

4.  Once the dependencies have been properly installed, you can run:

```bash
$ ./vendor/bin/sail up -d
```

5.  Once the project is running, you need to run the migrations, for that run the commands:

```bash
# Access the container
$ docker exec -it test-product-list-laravel.test-1 bash
```

```bash
$ php artisan migrate
```

6.  To load data for testing, use the command::

```bash
$ php artisan db:seed
```

7. The project should be available at:: [localhost](http://localhost:3000/)

## Important notes

-   It is advisable to have [Postman](https://www.postman.com/) on your machine so you can test the available routes in this API.
-   The use of Docker is strongly advised.
## Dependencies and their versions

-   [PHP](https://www.php.net/releases/8.3/en.php) 8.3
-   [Laravel](https://laravel.com/docs/11.x) 11x
-   [Laravel Sail](https://laravel.com/docs/11.x/sail)
-   [MySQL](https://www.mysql.com/)

## Important notes

-   Have the necessary collections to test [by clicking here](https://github.com/lucasfullstackdev/test-product-list/blob/main/API%20Documentation.postman_collection.json)

## Final considerations

-   The API may undergo changes; this API does not represent a real sample and should only be used to get an idea of how a REST API works.
-   For any questions or suggestions, please contact me via email: lucas.fullstack.dev@gmail.com
