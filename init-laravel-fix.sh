# 1) остановить всё
docker compose down

# 2) поднять только app (без queue, чтобы не падал)
docker compose up -d --build app postgres redis

# 3) создать Laravel прямо в текущей папке (где лежит docker-compose.yml)
docker compose exec app composer create-project laravel/laravel .

# 4) проверить что artisan появился
docker compose exec app ls -la /var/www

# 5) теперь можно поднимать остальные сервисы
docker compose up -d --build