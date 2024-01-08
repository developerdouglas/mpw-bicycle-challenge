FROM php:8.2-fpm

RUN apt update && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev
RUN docker-php-ext-install intl opcache pdo pdo_mysql
RUN docker-php-ext-install zip && docker-php-ext-configure zip
RUN pecl install apcu && docker-php-ext-enable apcu
RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Creating cache directories
# Linking cache directories
# Install vendor files
#CMD bash -c "mkdir -p /var/cache/MPW/vendor && mkdir -p /var/cache/MPW/var && chmod -R 775 /var/cache/MPW/ && rm -rf /app/vendor && ln -s /var/cache/MPW/vendor /app/vendor && rm -rf /app/var && ln -s /var/cache/MPW/var /app/var && composer install && php-fpm"
CMD bash -c "composer install && php-fpm"