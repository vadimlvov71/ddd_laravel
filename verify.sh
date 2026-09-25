docker compose exec app ls -la /var/www/artisan
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
docker compose up -d queue