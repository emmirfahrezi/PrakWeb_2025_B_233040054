@echo off
REM Clear all Laravel caches for Windows
echo Clearing Laravel caches...
php artisan optimize:clear
echo.
echo Checking posts.show route:
php artisan route:list | findstr posts.show
echo.
echo Done! Cache cleared.
pause
