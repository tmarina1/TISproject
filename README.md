# Para ejecutar el programa de manera local:

1. Debe clonar el repositorio de la siguiente dirección https://github.com/tmarina1/TISproject.git en la dirección local del computador c:\xampp\htdocs
2. Luego de esto debe de instalar composer para tener todos los paquetes necesarios con el comando php composer install
3. Cambie el archivo .env y modifique el nombre de la base de datos por pointandshoot
4. Ingrese a la ruta c:\xampp\htdocs\TISproject\TISproject
5. Corra las migraciones con el comando "php artisan migrate"
6. Corra el comando "php artisan storage:link" para el buen funcionamiento del manejo de imágenes
7. Por ultimo corra el comando "php artisan serve" para iniciar el proyecto
8. Ingrese en el navegador a la siguiente dirección http://127.0.0.1:8000/
