##Installation
- Run `sudo chown -R www-data:www-data .` from inside the project folder. The docker Apache process needs the files to be owned by www-data. This is extremely annoying but I haven't found a solution yet.
- Run `start.sh`
- Create `backend/.env` file. Example:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=devenv_mysql
DB_PORT=3306
DB_DATABASE=app_db
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```
- Run `start.sh`, and, inside the container:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan storage:link`
    - `php artisan migrate:fresh --seed`
- `code . --user-data-dir ./.vscode`. Related to the first point :(

-----

TODO: fix permissions issue
TODO: automate this process