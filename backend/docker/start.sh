#!/bin/sh

set -e

# Wait for database
if [ -n "$DB_HOST" ]; then
    echo "Waiting for database connection..."
    until php artisan db:show --quiet 2>/dev/null; do
        sleep 2
    done
    echo "Database connected."
fi

# Run Laravel setup
php artisan migrate --force
php artisan storage:link --force
php artisan optimize

# Clear cached views and config
php artisan view:clear
php artisan config:clear

# Start supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
