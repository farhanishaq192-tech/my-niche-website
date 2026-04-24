#!/bin/bash
set -e

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Seeding admin user and default data..."
php artisan db:seed --class=AdminSeeder --no-interaction

echo "==> Optimizing..."
php artisan optimize
php artisan storage:link || true

echo "==> Starting server..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
