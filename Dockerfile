#vamos a usar una img base de php con apache para correr nuestro proyecto
From php:8.1-apache

#instalamos las dependencias necesarias para conectar con postgres
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql 

#ahora copiamos nuestro proyecto al directorio de apache
COPY . /var/www/html/  

#exponiendo el puerto 80 para que pueda ser accedido desde el exterior
EXPOSE 80  




