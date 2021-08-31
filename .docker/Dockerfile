FROM php:7.3-apache

RUN apt-get update && apt-get install -y libbz2-dev zlib1g-dev libpng-dev libgmp-dev libicu-dev \
    libsnmp-dev libtidy-dev libxml2-dev libxslt-dev libzip-dev libmagickwand-dev --no-install-recommends

RUN apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install imap

RUN docker-php-ext-install bcmath bz2 calendar exif gd gmp intl mysqli \
    opcache pdo pdo_mysql snmp tidy xmlwriter xmlrpc xsl zip

RUN pecl install imagick xdebug

RUN docker-php-ext-enable imagick

RUN a2enmod rewrite vhost_alias

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
