# Gunakan image PHP 8.4 CLI
FROM php:8.4-cli

# Install dependensi untuk MySQLi
RUN apt-get update && apt-get install -y libmariadb-dev

# Install ekstensi mysqli
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Expose port 3000 untuk mengakses server PHP built-in
EXPOSE 3000

# Perintah untuk menjalankan PHP built-in server
CMD ["php", "-S", "0.0.0.0:3000", "-t", "."]
