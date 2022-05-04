## Laravel 8 Example


### existing project

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

### new laravel 8 project

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer create-project laravel/laravel:^8.0 laravel8-example && cd laravel8-example && php ./artisan sail:install --with=mysql,mailhog
```

### github

```
git init
git add -A
git commit -m "start laravel 8"
git branch -M main
git remote add origin git@github.com:matrizlab/laravel8-example.git
git push -u origin main
```
