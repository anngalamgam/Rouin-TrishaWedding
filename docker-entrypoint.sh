
#!/bin/sh

set -e

cd /app

mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan storage:link || true

exec /usr/bin/supervisord -c /etc/supervisord.conf
