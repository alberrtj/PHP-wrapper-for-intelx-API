# PHP Wrapper for intelx.io API

intelligence X PHP interface is wrapper for intelx.io API, made to perform any kind of open-source intelligence. you can easily download Full Data and Set buckets, Date limitation or Public Sources.

![](https://file.io/N76d8f36US2R)

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

step5:
executed the following commands:

    $   php artisan serve

After running the server at your system you can easily search and download.

## Getting Started
Login information: 

	Username: admin@domain.com & password: 123456
	
## Attention:
To Protect your API_KEY, Restrict Panel Access From Others
