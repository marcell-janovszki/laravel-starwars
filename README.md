# ! IMPORTANT !

### Repo containes .env files & default dev environment data!

<br/>

# Quickstart

1.  Install dependencies

    `docker run --rm \ -u "$(id -u):$(id -g)" \ -v $(pwd):/var/www/html \ -w /var/www/html \ laravelsail/php81-composer:latest \ composer install --ignore-platform-reqs`

<br/>

2.  Run migrations

    `./vendor/bin/sail php artisan migrate`

<br/>

3.  Start development server

    `./vendor/bin/sail up`

<br/>

4.  Fetch data from API

    `http://localhost/update/people`

<br/>

5.  Visit

    `http://localhost/people`
