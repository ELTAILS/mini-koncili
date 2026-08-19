#!/bin/sh
set -eu

PORT="${PORT:-10000}"

# Render injects environment variables at runtime. Replace the placeholder
# in the Nginx template with the actual Render port.
envsubst '${PORT}' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf
rm -f /etc/nginx/conf.d/default.conf.template

# Make sure Laravel can write its runtime directories.
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Roda as migrations pendentes antes de qualquer coisa
php artisan migrate --force

# Rebuild Laravel's production caches when the container starts.
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in the background, then keep Nginx in the foreground so the
# Render Web Service stays alive.
php-fpm -D
exec nginx -g 'daemon off;'
