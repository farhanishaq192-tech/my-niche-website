#!/bin/bash

echo "==> PHP version..."
php --version

echo "==> Clearing all caches first..."
php artisan optimize:clear || true

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Creating/updating admin user..."
php artisan admin:create

echo "==> Seeding packages and settings..."
php artisan db:seed --class=AdminSeeder --no-interaction || echo "Seeder note: continuing"

echo "==> Caching config (safe)..."
php artisan config:cache

echo "==> Publishing Filament assets..."
php artisan filament:assets

echo "==> Storage link..."
php artisan storage:link || true

echo "==> Starting server on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
