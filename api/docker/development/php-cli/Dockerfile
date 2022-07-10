FROM php:7.4-cli-alpine

RUN apk update && apk add unzip

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./common/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_VERSION 2.0

FROM composer:2.0 as vendor

RUN composer install \
    --no-interaction \
    --version=$COMPOSER_VERSION \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist \

RUN composer global require hirak/prestissimo --no-plugins --no-scripts \
    && rm -rf /root/.composer/cache

WORKDIR /app