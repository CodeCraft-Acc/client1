#!/bin/bash

# Wait for DB to be ready
if [ "$1" = "artisan" ]; then
    until nc -z -v -w30 db 3306
    do
        echo "Waiting for database connection..."
        sleep 5
    done
fi

# Set the proper permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Run migrations if needed
if [ "$1" = "artisan" ] && [ "$2" = "migrate" ]; then
    php /var/www/artisan migrate --force
fi

# Generate application key if not exists
if [ "$1" = "artisan" ] && [ "$2" = "key:generate" ]; then
    php /var/www/artisan key:generate
fi

# Clear and cache config
if [ "$1" = "artisan" ] && [ "$2" = "config:cache" ]; then
    php /var/www/artisan config:cache
fi

# Execute the passed command
exec "$@"