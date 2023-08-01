## Movie Catalog Application

### Create a local development instance from scratch

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
- Prerequisites: installed locally [docker](https://docs.docker.com/get-docker/) and [docker-compose](https://docs.docker.com/compose/install/)
- Clone the repository: `git clone git@github.com:staradzinau/app-movie-catalog.git`
- Go down to the new directory: `cd app-movie-catalog`
- Create the env file from the template: `cp .env.example .env`
- If necessary, adjust variables in the `.env` file
- Install Composer dependencies: `docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs`. See details [here](https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects)
- Start Laravel Sail: `./vendor/bin/sail up -d`, see details [here](https://laravel.com/docs/10.x/sail#starting-and-stopping-sail)
- Generate the key for the application: `./vendor/bin/sail artisan key:generate`. [Details](https://laravel.com/docs/10.x/encryption#configuration)
- Migrate your database: `./vendor/bin/sail artisan migrate`
- The application is ready