Setup:
1. cd into the main folder: ```cd ~/food-picker-api```
2. Copy .env.example to .env: ```cp .env.example .env```
3. Start docker container: ```docker-compose up```
4. Open the app 'food-picker_app_1' with the docker CLI
5. Seed database: ```php artisan db:seed```
6. Run feature tests ```php artisan test```
