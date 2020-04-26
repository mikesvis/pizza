## Pizza time with Vue & Laravel

Pizza delivery app in VueJS - Pizzalicious!

### Key features

1. SPA using VueJS (Vue, Vue-router, Vuex, Bootstrap-vue, Vue-agile)
2. Back in Laravel
3. Options for pizza size & crust
4. Pizza image size and picture itself depends on option
5. Currency toggler
6. Polymorph product prices and images
7. Backend tests for pizzas listing, pizza option, order.
8. Git flow, which was integrated in the middle of the project :)

### Deployment

Console commands

```console
git clone git@github.com:mikesvis/pizza.git
cd pizza
cp .env.example .env
composer install
php artisan key:generate
```

Update site url and database connection config variables in `.env`

```
APP_URL=YOUR_SITE_ADDRESS
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Then run migrations, seeded & server. It will prompt to run commands in case of `APP_ENV=production`. To avoid production environment the appropriate value of `APP_ENV` should be used.

```console
php artisan migrate
Do you really wish to run this command? (yes/no) [no]: yes

php artisan db:seed
Do you really wish to run this command? (yes/no) [no]: yes

php artisan serve
```

This should get you up and running...

### Contact

In case you have any questions mail me to [mihail.svistulenko@yandex.ru](mihail.svistulenko@yandex.ru), [djthor@bk.ru](mailto:djthor@bk.ru)
