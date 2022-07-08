Setup:
1. cd into the main folder: ```cd ~/food-picker-api```
2. Copy .env.example to .env: ```cp .env.example .env```
3. Start docker container: ```docker-compose up```
4. Open the app 'food-picker_app_1' with the docker CLI
5. Run feature tests (CityControllerTest.php, CuisineControllerTest.php, RestaurantControllerTest.php): ```php artisan test```


List of API endpoints:

- http://localhost:80/api/restaurant/name/{name}
  - Get a restaurant by its name
  - E.g.: http://localhost:80/api/restaurant/name/delikatessen
- http://localhost:80/api/restaurant/distance/{latitude}/{longitude}
  - Get the closest restaurant by your current position (by your latitude and longitude)
  - E.g.: http://localhost:80/api/restaurant/distance/50/50
- http://localhost:80/api/restaurant/freetext/{freetext}
  - Get an array of restaurants by either its name, city, or cuisine 
  - E.g.: http://localhost:80/api/restaurant/freetext/pizza

- http://localhost:80/api/city/{name}
  - Get a city by its name, and all of its restaurants
  - E.g.: http://localhost/api/city/stockholm

- http://localhost:80/api/cuisine/{name}
  - Get a cuisine by its name, and all of its restaurants
  - E.g.: http://localhost/api/cuisine/italienskt
