FROM php:8.2-fpm

RUN apt update && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev
RUN docker-php-ext-install intl opcache pdo pdo_mysql
RUN docker-php-ext-install zip && docker-php-ext-configure zip
RUN pecl install apcu && docker-php-ext-enable apcu

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

CMD bash -c "composer install && php-fpm"