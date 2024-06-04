# Makefile
SHELL := /bin/bash
tests:
	APP_ENV=test symfony console doctrine:database:drop --force || true
	APP_ENV=test symfony console doctrine:database:create
	APP_ENV=test symfony console doctrine:schema:update --force
	APP_ENV=test symfony console doctrine:fixtures:load -n
	APP_ENV=dev symfony php bin/phpunit $(MAKECMDGOALS)

up:
	docker compose up -d --wait
	symfony serve -d

down:
	symfony server:stop

phpstan:
	APP_ENV=dev symfony php vendor/bin/phpstan analyse --level max

phpcs fix:
	APP_ENV=dev symfony php vendor/bin/php-cs-fixer fix

phpcs cry-run:
	APP_ENV=dev symfony php vendor/bin/php-cs-fixer fix --dry-run

quality:
	make php-cs-fixer
	make phpstan
	make tests

make-migration:
	symfony console make:migration --formatted

migrate:
	symfony console doctrine:migrations:migrate -n

.PHONY: tests