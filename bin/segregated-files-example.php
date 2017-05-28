#!/usr/bin/env php
<?php

use Example\Cli\Greet;
use Example\Cli\SayHello;
use Symfony\Component\Console\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application('Example application - inlined version');

$app->addCommands([
    new Greet(),
    new SayHello(),
]);

$app->run();
