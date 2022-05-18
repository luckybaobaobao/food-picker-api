Setup:
1. cd into the main folder: ```cd ~/food-picker-api```
2. Copy .env.example to .env: ```cp .env.example .env```
3. Start docker container: ```docker-compose up```
4. Open the app 'food-picker_app_1' with the docker CLI
5. Run migrations: ```php artisan migrate```
6. Seed database (DatabaseSeeder.php): ```php artisan db:seed```
7. Run feature tests (CityControllerTest.php, CuisineControllerTest.php, RestaurantControllerTest.php): ```php artisan test```


List of API endpoints (see ```routes/api.php```):

- http://localhost:80/api/restaurant/name/{name}
- http://localhost:80/api/restaurant/distance/{latitude}/{longitude}
- http://localhost:80/api/restaurant/index/{freetext}

- http://localhost:80/api/city/{name}

- http://localhost:80/api/cuisine/{name}
