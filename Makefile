run:
	docker-compose up -d
	docker ps

stop:
	docker-compose down

migrate:
	docker-compose exec php bin/console doctrine:migrations:migrate

consume:
	docker-compose exec php bin/console messenger:consume -vv async