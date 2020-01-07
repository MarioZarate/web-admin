FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libjpeg-dev \
        libssl-dev \
        libssh-dev \
        libmemcached-dev \
        libpng-dev \
        git-core \
        zip \
        libcurl3-dev \
        curl \
        unzip \
        libzip-dev \
    	&& docker-php-ext-configure gd \
                --enable-gd-native-ttf \
                --with-freetype-dir=/usr/include/freetype2 \
                --with-png-dir=/usr/include \
                --with-jpeg-dir=/usr/include \
    	&& docker-php-ext-install gd zip curl pdo_mysql mbstring bcmath sockets gd

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

EXPOSE 9000

CMD ["php-fpm", "-F"]
