# SubMan Backend

Backend app for SubMan written in PHP with [Slim](slimframework.com/).

# Endpoints
## `/`
returns "Hello Subman!"

# Usage

## Set This Up
1. clone this repo
2. run `composer install`
3. to serve
    - With php in-built server `php -S localhost:8080 -t public public/index.php`

### Database Set Up

1. set database up in `database.php`
2. to get $db object anywhere, do $db = this->get("db") to get a PDO object