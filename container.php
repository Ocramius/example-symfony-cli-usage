<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Zend\ServiceManager\ServiceManager;

return new ServiceManager([
    'factories' => [
        Application::class => function (ContainerInterface $container) : Application {
            $application = new Application();

            $application->addCommands($container->get('cli-commands'));

            return $application;
        },
        'cli-commands' => function () : array {
            return [];
        },
    ],
]);
