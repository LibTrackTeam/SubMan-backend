# SubMan Backend

Backend app for SubMan written in PHP with [Slim](slimframework.com/).

# REST Endpoints

## `/rest/category`

## `/rest/service`

## `/rest/subscription`

## `/rest/user`


# Usage

## Set This Up
1. clone this repo `git clone https://github.com/LibTrackTeam/SubMan-backend`
2. run `composer install`
3. run `bash scripts/install.sh`
4. to serve with php's inbuilt server, run `composer serve`

### Database Set Up

1. set database up in `database.php`
2. to get $db object anywhere, do $db = this->get(PDO::class) to get a PDO object
