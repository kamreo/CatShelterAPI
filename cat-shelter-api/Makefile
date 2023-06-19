DB_CONTAINER_NAME := cat-shelter-api-db-1
APP_CONTAINER_NAME := cat-shelter-api-app-1
DB_USER := cat_shelter
DB_PASS := @Haslo1223
DB_NAME := cat_shelter_db
.PHONY: db-shell app-test app-run

db-shell:
	docker exec -it $(DB_CONTAINER_NAME) mysql -u $(DB_USER) -p$(DB_PASS) $(DB_NAME)

app-test:
	docker exec -it $(APP_CONTAINER_NAME) php artisan test

app-run:
	docker exec -it $(APP_CONTAINER_NAME) sh -c "$(filter-out $@,$(MAKECMDGOALS))"
%:
	@:
