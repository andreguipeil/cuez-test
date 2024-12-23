# Docker env for php applications
Welcome to the mini structure for laravel/symfony/postgres/nginx applications.


This project contains the docker structure to create new project in laravel/symfony.

### step 1
```
cp .env.dist .env
```

### step 2
To start the containers
````bash
docker-compose up -d --build
````

To stop
```bash
docker-compose down -v
```

What this project contains:
- php 8.4
- composer
- postgres
- nginx

### access
Accessing the link below should open the php info

http://localhost:8000/

Database infos
````
database:
name: doppn
user: doppn
pass: doppn
````
