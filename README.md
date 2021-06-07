# Books4u: CRUD application in Laravel

http://yarakucrud-env.eba-m6dkmzq8.us-east-2.elasticbeanstalk.com/

## About

Simple CRUD application written in Laravel 6.2.
Includes the following features: 

    - Add a book to the list.
    - Delete a book from the list.
    - Change an authors name
    - Sort by title or author
    - Search for a book by title or author
    - Export the the following in CSV and XML
        - A list with Title and Author
        - A list with only Titles
        - A list with only Authors
        
## Local 

Clone this repo to your desired directory. 

```
git clone https://github.com/j-scu486/books4u.git
```

Run the following two commands to install dependicies for npm and laravel:
```
npm install && npm run prod
composer install
```
An app key will also need to be generated:
```
php artisan key:generate
```
Copy ```.env.example``` to ```.env``` . You will need to change these settings depending on your database setup.
Once these settings are in place, migrations can be run with:

```php artisan migrate```

If you wish to populate the database with dummy data, you may seed it with the following commands:
```
php artisan db:seed --class=AuthorSeeder
php artisan db:seed --class=BookSeeder
```
Then, run the server locally:
``` php artisan serve```


## Deployment

The application is configured to be deployed on AWS Elasticbeanstalk.

Steps to reproduce (From Elasticbeanstalk console):
- Select "create a new environment"
- For the environement tier, select "Web server environment"
- Set preferred application name
- Platform should be set to PHP 7.4 on Linux 2 instance
- Upload code from zip file
- Select "Configure more options"
- Under "Software", set document root to "/public"
- Under "Database", set engine to mysql, version 8.x. Username and password as desired
- Create environment.

```database.php``` needs to be modified accordingly to read environment variables from ElasticBeanstalk:
```
'mysql' => [
    'driver' => 'mysql',
    'host' => env('RDS_HOSTNAME', '127.0.0.1'),
    'port' => env('RDS_PORT', '3306'),
    'database' => env('RDS_DB_NAME', 'forge'),
    'username' => env('RDS_USERNAME', 'forge'),
    'password' => env('RDS_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => true,
    'engine' => null,
],

```
Scripts will be run automatically to make migrations and seed the database with dummy data. These scripts are located
in```/.ebextensions```

For further information on deploying Laravel on EBS , see https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/php-laravel-tutorial.html#php-laravel-tutorial-database

## Tests

From the root directory, run ```./vendor/bin/phpunit```







