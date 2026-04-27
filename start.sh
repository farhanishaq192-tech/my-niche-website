#!/bin/bash

echo "==> PHP version..."
php --version

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Creating/updating admin user..."
php artisan tinker --no-interaction <<'TINKER'
use App\Models\User;
use Illuminate\Support\Facades\Hash;
User::updateOrCreate(
    ['email' => 'admin@neuralcraft.pk'],
    ['name' => 'NeuralCraft Admin', 'password' => Hash::make('admin1234')]
);
echo "Admin user ready.\n";
TINKER

echo "==> Seeding packages and settings..."
php artisan db:seed --class=AdminSeeder --no-interaction || echo "Seeder note: some records may already exist"

echo "==> Config cache (safe)..."
php artisan config:clear
php artisan config:cache

echo "==> Publishing Filament assets..."
php artisan filament:assets

echo "==> Storage link..."
php artisan storage:link || true

echo "==> Starting server on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
