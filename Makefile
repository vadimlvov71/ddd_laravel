.PHONY: up down build restart logs bash migrate fresh key queue test artisan

## Start all containers in background.
up:
	docker compose up -d

## Stop all containers.
down:
	docker compose down

## Build images and start all containers.
build:
	docker compose up -d --build

## Restart all running containers.
restart:
	docker compose restart

## Show logs for all Docker services.
logs:
	docker compose logs -f

## Open a shell in the PHP application container.
bash:
	docker compose exec app sh

## Generate Laravel application key.
key:
	docker compose exec app php artisan key:generate

## Run database migrations.
migrate:
	docker compose exec app php artisan migrate

## Drop all tables and run migrations again.
fresh:
	docker compose exec app php artisan migrate:fresh

## Start a queue worker manually in the foreground.
queue:
	docker compose exec app php artisan queue:work --tries=3 --sleep=1

## Run the Laravel test suite.
test:
	docker compose exec app php artisan test

## Run an arbitrary Artisan command.
## Example: make artisan cmd="route:list"
artisan:
	docker compose exec app php artisan $(cmd)