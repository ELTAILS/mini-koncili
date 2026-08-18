# Production image for Laravel on Render.
# Keeps the existing local Docker setup untouched and adds a dedicated
# production image that runs Nginx + PHP-FPM in one Web Service.

FROM node:22-alpine AS frontend
WORKDIR /app

COPY package*.json ./
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

COPY . .
RUN npm run build

FROM php:8.5-fpm

ENV APP_ENV=production \
    APP_DEBUG=false \
    PORT=10000

RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    ca-certificates \
    curl \
    git \
    unzip \
    zip \
    supervisor \
    gettext-base \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath \
    && rm -rf /var/lib/apt/lists/*


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP dependencies first to improve Docker layer caching.
COPY composer.json composer.lock* ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .
COPY --from=frontend /app/public/build ./public/build

# Production Nginx configuration and startup script.
COPY docker/render/nginx.conf /etc/nginx/conf.d/default.conf.template
COPY docker/render/start.sh /usr/local/bin/render-start.sh
RUN chmod +x /usr/local/bin/render-start.sh \
    && rm -f /etc/nginx/sites-enabled/default \
    && mkdir -p /run/nginx /var/log/supervisor \
    && chown -R www-data:www-data storage bootstrap/cache

# Render only needs one HTTP port from the Web Service.
EXPOSE 10000

CMD ["/usr/local/bin/render-start.sh"]
