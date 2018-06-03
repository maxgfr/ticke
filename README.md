# ticke

## Initialize

### 1) In .env of laravel app, add :

```
DB_HOST=mysql

REDIS_HOST=redis

QUEUE_HOST=beanstalkd
```

### 2) In the app directory:

```
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
```

### 3) In laradock/, open .env and add :

```
APP_CODE_PATH_HOST=../
```

### 4) Launch :

```
docker-compose up -d nginx mysql phpmyadmin redis workspace
```

### Commands

To connect to container :
```
docker-compose exec workspace bash
docker-compose exec workspace mysql
```

### Problems :

#### 1° In laradock/

Restart containers :
```
docker-compose down
docker-compose up -d nginx mysql phpmyadmin redis workspace
```

Connect to a container :
```
docker-compose exec workspace bash
composer install
php artisan key:generate
php artisan cache:clear
php artisan config:cache
php artisan migrate
```

Switch from mysql to mariadb :

To use with MariaDB, in laradock open .env and set PMA_DB_ENGINE=mysql to PMA_DB_ENGINE=mariadb
```
docker-compose down
docker-compose up -d nginx mariadb phpmyadmin redis workspace
```
Then, in .env of the app :
```
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=root
DB_PASSWORD=root
```

### 2° In app directory :
```
php artisan cache:clear
php artisan config:cache
```

```
chmod -R 777 storage bootstrap/cache
```

## Test API

### Register

```shell
curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Doe", "firstname": "John", "mobile": "0621425347", "email": "john-doe@max.com", "password": "maxmaxmax", "password-confirm": "maxmaxmax"}'
```
### Login

```shell
curl -X POST http://localhost:8000/api/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"email": "john-doe@max.com", "password": "maxmaxmax"}'
```
