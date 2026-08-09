FROM php:8.2-fpm-alpine

# تثبيت متطلبات النظام
RUN apk add --no-cache \
    nginx \
    supervisor \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    git \
    oniguruma-dev \
    icu-dev \
    icu-libs \
    nodejs \
    npm

# تثبيت إضافات PHP
RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
        gd \
        pcntl \
        bcmath \
        intl

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Composer dependencies
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# نسخ المشروع
COPY . .

# Node dependencies
RUN npm ci

# بناء Vite
RUN npm run build

# تأكد أن Vite أنشأ manifest.json
RUN test -f /var/www/html/public/build/manifest.json

# إعداد Nginx و Supervisor
COPY ./docker/nginx.conf /etc/nginx/nginx.conf

COPY ./docker/supervisord.conf \
    /etc/supervisor/conf.d/supervisord.conf

# الصلاحيات
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

EXPOSE 80

CMD php artisan migrate:fresh --seed --force && \
    /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
