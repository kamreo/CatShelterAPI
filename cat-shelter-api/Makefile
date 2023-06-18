DB_CONTAINER_NAME := cat-shelter-api_db_2
APP_CONTAINER_NAME := cat-shelter-api_app_2
DB_USER := cat_shelter
DB_PASS := @Haslo1223
DB_NAME := cat_shelter_db
.PHONY: db-shell
db-shell:
	docker exec -it $(DB_CONTAINER_NAME) mysql -u $(DB_USER) -p$(DB_PASS) $(DB_NAME)

app-test:
	docker exec -it $(APP_CONTAINER_NAME) php artisan test
