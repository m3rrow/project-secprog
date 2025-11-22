<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## installation for create new laravel
> powershell administrative mode
```
$ choco install -y git php composer nodejs-lts
```

> edit php.ini to enable database and file storage capability
```
$ php --ini
'''
extension=pdo_mysql
extension=mysqli
extension=fileinfo
'''
```

> create new project
```
$ php composer.phar create-project laravel/laravel secprog --ignore-platform-req=ext-fileinfo
$ cd secprog
```

> pull all vendor (berguna kalo digunain ke device lain)
```
$ composer require laravel/framework:12.28.1 --update-with-all-dependencies --ignore-platform-req=ext-fileinfo
```

> modify database connection in .env
```
$ copy .env.example .env
'''
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secprog
DB_USERNAME=root
DB_PASSWORD=
'''
```

> this app using real email notification, so change below config in .env by setup "App Password" from google mail  
```
## Google App Password (must setup your own google app password lah)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=CHANGE_THIS_EMAIL
MAIL_PASSWORD="CHANGE_THIS_PASSWORD"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=CHANGE_THIS_EMAIL
MAIL_FROM_NAME="${APP_NAME}"
```

> start the laravel webserver
```
# generate key & migration table to database
$ php artisan key:generate
$ php artisan session:table
$ php artisan migrate:fresh --seed

# to sync local storage
$ php artisan storage:link

# start webserver
$ php artisan serve
```


#### > you can use postman for api testing https://github.com/m3rrow/project-secprog/blob/main/Web-API/secprog.postman_collection.json
