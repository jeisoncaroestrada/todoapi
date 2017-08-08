#ToDoLaravelApi

1.Ejecutar 
`composer install` 

para instalar todas las dependencias

2.Configurar el archivo .env 
`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todoapp
DB_USERNAME=root
DB_PASSWORD=` 

esto prepara la coneccion con la base de datos

3.Crear la base de datos 
#todoapp

4.Ejecutar el comando 
`php artisan migrate`

Para correr las migraciones y crear las tablas

5.Ejecutar el comando 
`php artisan serve`

inicia el servidor de desarrollo de Laravel : <http://127.0.0.1:8000>