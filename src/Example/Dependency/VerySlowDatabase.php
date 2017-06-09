<?php

declare(strict_types=1);

namespace Example\Dependency;

class VerySlowDatabase
{
    public function __construct()
    {
        /** @noinspection ForgottenDebugOutputInspection */
        error_log('Initializing database connection...');
        sleep(5); // this is done on purpose to demonstrate slow dependency issues
        /** @noinspection ForgottenDebugOutputInspection */
        error_log('Database connection enstablished...');
    }

    public function query() : string
    {
        return 'Database result: ' . random_int(1, 10000);
    }
}