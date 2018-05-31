FROM php:7.0.28-apache

# Set the root folder for the appliaction
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Add missing dependencies
RUN apt-get update \
	&& apt-get install -y libicu-dev git zip libpq-dev libmemcached-dev curl

# Install and activate Intl module
RUN docker-php-ext-configure intl \
	&& docker-php-ext-install intl

# Install and activate Mysql module
RUN docker-php-ext-install pdo pdo_mysql

# Install Memcached for php 7
RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    && mkdir -p /usr/src/php/ext/memcached \
    && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && docker-php-ext-configure memcached \
    && docker-php-ext-install memcached \
    && rm /tmp/memcached.tar.gz

# Enable the rewrite module
RUN a2enmod rewrite
RUN echo "extension="php_intl.dll"" >> php.ini


# Change document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install composer
RUN curl --silent --show-error https://getcomposer.org/installer | php

# Add composer dependencies
ADD composer.json /var/www/html

# Run composet to get all dependenci
#RUN php /var/www/html/composer.phar install