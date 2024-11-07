<?php

declare(strict_types=1);

return [
    'database' => env('DB_CONNECTION', config('databae.default')),

    'auto_migrate' => env('HTTP_LOGGER_AUTO_MIGRATE', true),
];
