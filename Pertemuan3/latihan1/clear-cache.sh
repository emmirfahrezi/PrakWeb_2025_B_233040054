#!/bin/bash
# Clear all Laravel caches
php artisan optimize:clear
echo "✓ All caches cleared"
php artisan route:list | grep posts.show
echo "✓ Routes reloaded"
