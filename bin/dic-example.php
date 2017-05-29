#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;

require_once __DIR__ . '/../vendor/autoload.php';

/* @var $container \Psr\Container\ContainerInterface */
$container = require __DIR__ . '/../container.php';

$container
    ->get(Application::class)
    ->run();
