# ---- Etapa 1: dependencias PHP (Composer) ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock* ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --ignore-platform-reqs
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# ---- Etapa 2: assets del tema (Laravel Mix) ----
FROM node:20-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm install
COPY . .
RUN npm run production

# ---- Etapa 3: imagen final ----
FROM serversideup/php:8.3-fpm-nginx
USER root
RUN install-php-extensions gd intl exif bcmath pdo_pgsql

WORKDIR /var/www/html
COPY --from=vendor /app .
COPY --from=assets /app/public ./public

RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

USER www-data
EXPOSE 8080
