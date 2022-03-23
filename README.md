Repositorio: 

Instrucciones de instalacion
1.- Clone el repositorio en su local

2.- Ubiquese en el dierectorio documents (nombre del proyecto de su local) y ejecute el siguiente comando

# composer install

3.- En su cliente de base de datos cree una base de datos llamada documentos. Seleccionela y cree las tablas e inserte los datos con el script que le proporcionamos llamado "documentos.sql"

4.- Configure su archivo enviroment, en la seccion de base de datos, de la siguiente manera:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=documentos
DB_USERNAME=root
DB_PASSWORD=suclave

5.- Levante el servidor ejecutando 
#  php artisan serve


6.- Acceda con los siguientes datos
usuario: misaeboca@gmail.com
clave: 12345678
