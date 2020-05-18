# chimera
A quiz framework developed on Laravel 6
# FRAMEWORK FOR CHIMERA WORKSPACE

## About this Application

Objective:
Framework to provide online application learning activities where learners can complete online. Different activities can be added, such as quiz with multiple choice or true-false questions.

Approach: 

Users are teachers who can create quiz question and answers then group them by topics. Students who can participate in the activity will be able to access specific a quiz, complete the questions and obtain a result.

Default, each activity question and answers can be text only, or image only, or text+image". 

General class diagram can be found in Chimera_class_diagram.jpg.

## Development environment:

- PHP 7.3
- [Laravel 6.x](https://laravel.com/docs/)
- Composer
- Postgresql 10
- node 12.5
- npm 6.9

## Installation from source:

Ensure the above environment is setup, retrieve the source, then run

composer update
php artisan ui vue --auth
npm install && npm run dev
php artisan cache:clear
php artisan migrate:refresh
php artisan db:seed --class=TopicsTableSeeder
php artisan db:seed --class=QuestionsTableSeeder
Start the application

From the web browser, http://localhost 

Clear view cache with
php artisan config:cache

## Security Vulnerabilities

If you discover a security vulnerability within this app. Please send an e-mail by this github author. All security vulnerabilities will be promptly addressed.

## License

Pending.
Under consideration is the open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
