# akelpetin/cv-examples

This repo includes some functions with the symfony components like http-foundation, routing, console.
It also include the doctrine orm with basic entities.


Requires
* Docker
* PHP 7.4

Install instructions
#### git clone and composer install
```
git clone https://github.com/akelpetin/cv-examples.git
cd cv-examples && composer install
```

#### Start docker container
```
docker compose up -d
```

#### create database tables
```
vendor/bin/doctrine orm:schema-tool:update --force
```

#### Create user via console command
```
php bin/console app:create-user
```

todo
* Add more logic and unit tests

Please visit my website:
[http://www.adem-kelpetin.de](http://www.adem-kelpetin.de)
