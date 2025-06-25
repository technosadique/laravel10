steps to set up project locally

Technology used: laravel 10, xampp, composer and bootstrap

download and unzip project folder from GIT and put it under htdocs folder

go to command line and go to your project folder

Create a database called laravel10

Update your .env file with the correct DB credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel10
DB_USERNAME=root
DB_PASSWORD=

excute below commands from CLI

D:\xampp\htdocs\laravel-multiauth>php artisan migrate

D:\xampp\htdocs\laravel-multiauth>php artisan db:seed UserSeeder

admin login credential 
--------------------------
Email:admin@test.com
Password: 123456

super admin login credential 
--------------------------
Email:superadmin@test.com
Password: 123456

member login credential 
--------------------------
Email:john@test.com
Password: 123456

execute below command
D:\xampp\htdocs\laravel-multiauth>php artisan serve

URL: http://127.0.0.1:8000/login