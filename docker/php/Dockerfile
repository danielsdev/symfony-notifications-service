FROM php:8.1.19-fpm-alpine3.18

RUN apk add --update --no-cache libintl icu icu-dev postgresql-dev pcre-dev $PHPIZE_DEPS \
 && docker-php-ext-install intl pdo pdo_pgsql \
 && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
 && sed -i 's/variables_order = "GPCS"/variables_order = "EGPCS"/g' /usr/local/etc/php/php.ini-*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /code
COPY . .
RUN composer install \
    --no-dev \
    --no-interaction \
    --optimize-autoloader \
    --classmap-authoritative \
    --no-scripts \
    --prefer-dist \
    --no-suggest \
    --no-progress
