PHP|Laravel : PHP 7.4|8.x
----------------------------------
follow all step

- git clone https://github.com/vivekjain197/cmspages.git
- cd cmspages
- composer install
- rename .env.example to .env
- Create database with name "cms" or any other name but make sure add that name in .env file
- php artisan migrate
- php artisan db:seed --class=UserSeeder      Once you run this comment then run 
- php artisan db:seed --class=PagesSeeder
- php artisan serve
- Add more page dynamically please follow this Admin link "http://127.0.0.1:8000/admin/users/login"
    Default username: "vivekjain197@gmail.com"
    defailt pass    : 123456
Then follow UI
