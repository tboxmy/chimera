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
-- laravelcollective/html
- Postgresql 10

- *Additional to be installed
- monolog/monolog suggests installing php-console/php-console (Allow sending log messages to Google Chrome)
- laravel/framework suggests installing symfony/filesystem (Required to create relative storage directory symbolic links (^5.0).)
- phpunit/phpunit suggests installing ext-soap (*)
- phpunit/phpunit suggests installing ext-xdebug (*)

Installation after retreiving the whole project, requires

- composer update --dev
- npm install && npm run dev
- php artisan ui vue --auth

## Security Vulnerabilities

If you discover a security vulnerability within this app. Please send an e-mail by this github author. All security vulnerabilities will be promptly addressed.

## License

Pending.
Under consideration is the open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
