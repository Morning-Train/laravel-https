# Helper for SSL & HTTPS

## Install

Via Composer

``` bash
$ composer require morningtrain/laravel-https
```

## Usage

Deploy the config files.

``` bash
$ php artisan vendor:publish
```
Update the following in your `.env`:
```
USE_SSL=true
REDIRECT_TO_HTTPS=true
```

Register the ForceSSL middleware as a global middleware in your `App\Httk\Kernel` class:
``` php
class Kernel extends HttpKernel
{
    /**
     * The application's middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \MorningTrain\Laravel\Https\Http\Middleware\ForceSSL::class,
    ];
}
```

## Credits

- [Morning Train][link-author]

