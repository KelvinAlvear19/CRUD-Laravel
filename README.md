<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Acerca Laravel

Laravel es un framework de aplicaciones web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia agradable y creativa para ser realmente satisfactorio.

## Importante
- Dentro de la carpeta QuintoSoa/models se encontratan los servicios de la aplicacion que deberan copiarse y pegarse dentro de htdocs(XAMP).
- Dentro de la carpeta Base_de_Datos se encontrara el .sql que e sebera instalar.

## Instalación
Asegúrate de tener instalados los siguientes requisitos en tu sistema:

- PHP >= 7.x
- Composer (https://getcomposer.org/)
- Mi version de composer 2.3.5
- MySQL o cualquier otro sistema de gestión de bases de datos soportado por Laravel
- 
Por favor, consulte la guía oficial de instalación de laravel para los requisitos del servidor antes de empezar.

Clonar el repositorio

      https://github.com/KelvinAlvear19/CRUD-Laravel.git

Cambia a la carpeta del repositorio

    cd laravel-realworld-example-app

Instala todas las dependencias usando composer

    composer install

Copia el archivo env de ejemplo y realiza los cambios de configuración necesarios en el archivo .env

    cp .env.ejemplo .env

Generar una nueva clave de aplicación

    php artisan clave:generar

Inicializar el servidor

    php artisan serve
