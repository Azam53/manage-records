#!/bin/bash

echo "Starting Laravel deployment..."

# Exit immediately if a command fails
set -e

# Check for .env file
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cp .env.example .env
fi

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate application key
echo "Generating application key..."
php artisan key:generate --force

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# (Optional) Seed admin user
if php artisan list | grep -q "db:seed"; then
    echo "Seeding admin user..."
    php artisan db:seed --class=AdminUserSeeder
fi

# Clear and cache config
echo "Optimizing application..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache

echo "Deployment completed successfully!"
