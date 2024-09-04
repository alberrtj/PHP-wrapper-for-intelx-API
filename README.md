# PHP Wrapper for intelx.io API

intelligence X PHP interface is wrapper for intelx.io API, made to perform any kind of open-source intelligence. you can easily download Full Data and Set buckets, Date limitation or Public Sources.

![](https://pouch.jumpshare.com/preview/gg80ttHOCNtBszUzk0vyaNIoCXE0zPjjPZn7ouEEfYtDXcoLnTox5XnujIcPvvdhztdwUBwoYLRFgm8ldsB4w6zXKxCyHF4B17NCBBe1eVc)

## System Requirements

The following are required to function properly.

*   Laravel Framework 9.19
*   PHP >= 8.0
*   MySQL 8


## Installation
 
step1:
As an initial setup of project, make sure that you have executed the following commands:

``` shell
$   composer install
```
step2:
Open the phpmyadmin and create a database and set the database name and username and password in the .env file.

    DB_DATABASE=  
    DB_USERNAME=  
    DB_PASSWORD=

step3:
executed the following commands:
``` shell
$   php artisan key:generate
$   php artisan config:clear
$   php artisan migrate
$   php artisan db:seed
```
step4:

    Open the INTELX.php file in the config folder and enter the **API_KEY** you received from the intelx.io site.

step4:
executed the following commands:

    $   php artisan serve

After running the server at your system you can easily search and download.

## Getting Started
Login information: 

	Username:admin@domain.com and password: 123456
	
Attention:
to protect your key, Restrict Panel Access from others
