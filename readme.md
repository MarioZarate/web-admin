Base PHP - Framework Laravel v5.5

```shell
Instalación de un proyecto:

# Actualizar la base del administrador
composer update
composer install

# Generamos una key para el proyecto
php artisan key:generate

# Ejecutamos las migraciones que vienen por defecto
php artisan migrate

# Creamos el usuario administrador
php artisan db:seed

# Para ejecutar servidor local:
php artisan serve
php artisan server --host=0.0.0.0 -port=8000

# Para crear solo modelos
php artisan make:model User
php artisan make:model User -m (se crea modelo y migración)

# Para crear solo migraciones
php artisan make:migration create_users_table

# Para crear controlador
php artisan make:controller Admin/UserController -r
php artisan make:controller Web/DefaultController

```