# Imagen basé
FROM php:8.0.25-apache

# Copiar los archivos de tu aplicación al directorio de trabajo del contenedor
COPY . /var/www/html
# Establecer el directorio de trabajo
WORKDIR /var/www/html
# Instalar extensiones PHP necesarias para MysOLi
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Exponer el puerto 80 que es el web y el 3306 que es para base de datos)
EXPOSE 80
EXPOSE 3306
# Comando para iniciar el servidor web (por ejemplo, Apache)
CMD ["apache2-foreground"]