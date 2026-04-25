#!/bin/bash

echo "==> PHP version..."
php --version

echo "==> Checking DB connection..."
php artisan migrate:status 2>&1 || echo "DB check done"

echo "==> Running migrations..."
php artisan migrate --force || echo "Migration warning (continuing)"

echo "==> Seeding admin user and default data..."
php artisan db:seed --class=AdminSeeder --no-interaction || echo "Seeder warning (continuing)"

echo "==> Clearing and caching config..."
php artisan config:clear
php artisan config:cache || echo "Config cache warning"

echo "==> Caching routes..."
php artisan route:clear
php artisan route:cache || echo "Route cache warning"

echo "==> Storage link..."
php artisan storage:link || true

echo "==> Starting server on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
