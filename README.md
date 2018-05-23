# ticke

1) In .env of laravel app, add :

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret

REDIS_HOST=redis

QUEUE_HOST=beanstalkd
```

2) In the app directory:

```
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
```

3) In laradock/, open .env and add :

```
APP_CODE_PATH_HOST=../
```

4) Launch :

```
docker-compose up -d nginx mysql phpmyadmin redis workspace
```


X) To connect to container :
```
docker-compose exec workspace bash
docker-compose exec workspace mysql
```

Y) Problem :

1°
```
docker-compose down
docker-compose up -d nginx mysql phpmyadmin redis workspace
```

2°
```
docker-compose build
```
3°
```
docker-compose exec workspace bash
php artisan migrate
```
