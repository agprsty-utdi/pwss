# Tugas PWSS K1 - CRUD Aplikasi Penjualan

<p align="center">
    <img src="src/public/img/beranda.png" alt="beranda">
</p>

## Introduction

Build a simple php application development environment with docker-compose.


## Requirement
- PHP v8.2.*
- Docker v19.*

## Installation

1. click [Use this template](https://github.com/agprsty-utdi/pwss/generate)
2. git clone & change directory
3. execute the following command

```bash
$ docker compose up -d --build
```
5. run the seeding data dummy
```bash
$ php src/seeder.php
```
6. show application in [http://localhost](http://localhost)
7. show phpmyadmin in [http://localhost:81](http://localhost:81)

## Preview Aplikasi

### Consumer

![Create Consumer](src/public/img/consumer/create.png)
*Create Consumer*

![List Consumer](src/public/img/consumer/list.png)
*List Consumer*

![Update Consumer](src/public/img/consumer/update.png)
*Update Consumer*

### Product

![Create Product](src/public/img/product/create.png)
*Create Product*

![List Product](src/public/img/product/list.png)
*List Product*

![Update Product](src/public/img/product/update.png)
*Update Product*

### Order

![Create Order](src/public/img/order/create.png)
*Create Order*

![List Order](src/public/img/order/list.png)
*List Order*

![Update Order](src/public/img/order/update.png)
*Update Order*