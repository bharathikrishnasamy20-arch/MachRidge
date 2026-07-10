#!/bin/sh

set -e

if [ -n "$DB_HOST" ]; then
    echo "Waiting for database connection..."
    until php artisan db:show --quiet 2>/dev/null; do
        sleep 2
    done
    echo "Database connected."
fi

php artisan migrate --force
php artisan storage:link --force
php artisan optimize

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
