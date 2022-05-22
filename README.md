## Laravel 8 Example


### existing project

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    php ./artisan sail:install --with=mysql,redis 
```

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

### clean

```
echo "" > storage/logs/laravel.log
```

### queue

change .env
QUEUE_CONNECTION=redis


sail artisan list

queue
queue:batches-table    Create a migration for the batches database table
queue:clear            Delete all of the jobs from the specified queue
queue:failed           List all of the failed queue jobs
queue:failed-table     Create a migration for the failed queue jobs database table
queue:flush            Flush all of the failed queue jobs
queue:forget           Delete a failed queue job
queue:listen           Listen to a given queue
queue:monitor          Monitor the size of the specified queues
queue:prune-batches    Prune stale entries from the batches database
queue:prune-failed     Prune stale entries from the failed jobs table
queue:restart          Restart queue worker daemons after their current job
queue:retry            Retry a failed queue job
queue:retry-batch      Retry the failed jobs for a batch
queue:table            Create a migration for the queue jobs database table
queue:work             Start processing jobs on the queue as a daemon


sail artisan queue:work
