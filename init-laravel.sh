docker compose exec app composer create-project laravel/laravel /tmp/laravel
docker compose exec app sh -c "cp -r /tmp/laravel/. /var/www/ && rm -rf /tmp/laravel"