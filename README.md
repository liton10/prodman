# prodman
A simple product management platform
Framework used: Laravel

Comes with Eloquent which is the best ORM 
Very light weight blade templating engine.
Easy database migrations
Built-in security features.

Setup instruction:

1. Copy .env.example file to .env file and put required values.
2. Create database for the app and provide database name in .env
3. For testing create seperate test database and place it in DB_TEST_DATABASE
4. generate APP_KEY by 'php artisan key:generate' from the application root.
5. composer update to get all the dependencies.

Testing: 

In config/database.php the testdb section has the database connection details.
Create the database and run 'php artisan migrate --database=testdb' to run the migration on test database settings.

Just run 'sudo vendor/bin/phpunit' from the application root to run the test. Test database gets truncated after the test is run.

Time:
It took around 10 Hours to complete the project.
