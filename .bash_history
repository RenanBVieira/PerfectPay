cd /var/www/routes/
ls -la
exit
ls -la
cd resources/views/
ls -la
exit
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php
composer dump-autoload
php artisan config:clear
php artisan cache:clear
php artisan package:discover
grep -r "PailServiceProvider" .
exit
composer clear-cache
rm -rf vendor composer.lock
composer install
ls vendor/laravel/pail
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
exit
