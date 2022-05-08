## Laravel 8 Example

### Admin api

```
sail up -d

sail artisan make:controller UserController


```

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

### open api

sail composer require "darkaonline/l5-swagger"

add to app/Http/Controllers/Controller.php
```
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Admin Documentation",
 *      description="Admin OpenApi description",
 *      @OA\Contact(
 *          email="matrizlab@info.com"
 *      ),
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Admin API Server"
 * )
 *
 */
```

add to .env
```
L5_SWAGGER_CONST_HOST=http://localhost/api
```

add to index app/Http/Controllers/UserController.php
```
    /**
     * @OA\Get(path="/users",
     *   @OA\Response(response="200",
     *     description="User Collection",
     *   ),
     * )
     */
```

sail artisan l5-swagger:generate
