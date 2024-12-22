# ilyes512/laravel-http-logger

A http logger package.

## Installation

You can install the package via composer:

```bash
composer require ilyes512/laravel-http-logger
```

### Publish the config file

Run the following command to publish the config file:

```bash
php artisan vendor:publish --tag="http-logger-config"
```

Run the following command to publish the migrations:

```bash
php artisan vendor:publish --tag="http-logger-migrations"
```

You might also want to set the `http_logger.auto_migrate` config to `false` to prevent the package from running the
migrations automatically. You can set this config value using the environment variable:
`HTTP_LOGGER_AUTO_MIGRATE=false`.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
