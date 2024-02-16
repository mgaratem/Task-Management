include .env

build:
	docker-compose -f docker-compose.yml build
	docker-compose -f docker-compose.yml up -d
	docker exec -d laravel_php composer install
	docker exec -d laravel_php [ ! -f .env ] \
		&& docker exec -d laravel_php cp -n .env.example .env \
		&& docker exec -d laravel_php php artisan key:generate
	docker exec -d laravel_php chmod 777 .env storage
	make stop
	echo "Build complete"

up:
	docker-compose -f docker-compose.yml up -d

stop:
	docker-compose -f docker-compose.yml stop

down:
	docker-compose -f docker-compose.yml down

bash:
	docker exec -it laravel_php /bin/sh

.PHONY: build up stop down bash