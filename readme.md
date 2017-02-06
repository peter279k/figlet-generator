# Figlet text generator

Figlet text generator is a web application that helps you generating the funny FIGLET texts and images.

## To do lists

- ~~finish the CI testing via travis-ci~~

## Unit testing

We use the ```QUnit``` to test the front end and AJAX code.

You can refer the folowing steps to build your own local unit testing environment.

- clone the repo which branch name is ```qunit-testing```.

- download the composer.phar

- download the bowerphp.phar

- do ```chmod 777 storage``` or let the storage folder have the writing permission.

- run ```php composer.phar install``` in root folder

- run ```cp .env.example .env```

- run ```php artisan key:generate```

- run ```php bowerphp.phar install``` in public folder

- run ```php artisan serve```

- open the web browser then you will see the unit testing result.

## Contribution

Thank you for considering contributing to the Figlet text generator!

## License

The Figlet text generator is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
