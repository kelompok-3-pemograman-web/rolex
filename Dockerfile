FROM php:8.4-cli

RUN apt-get update && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html

EXPOSE 3000

CMD ["php", "-S", "0.0.0.0:3000", "-t", "."]
