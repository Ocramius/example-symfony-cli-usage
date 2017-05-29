<?php

declare(strict_types=1);

use Example\Cli\Greet;
use Example\Cli\SayHello;
use Interop\Container\ContainerInterface as InteropContainer;
use PackageVersions\Versions;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;

return new ServiceManager([
    'factories' => [
        Application::class => function (ContainerInterface $container) : Application {
            $application = new Application(
                'Example application - DIC setup - versioned',
                Versions::getVersion('ocramius/example-symfony-cli-usage')
            );

            $application->addCommands($container->get('cli-commands'));

            return $application;
        },
        'cli-commands' => function () : array {
            return [];
        },
        Greet::class => InvokableFactory::class,
        SayHello::class => InvokableFactory::class,
    ],
    // note: we use delegators so we can push to the "cli-commands" service
    // before it is passed over to consumers (the Application service, in this case)
    'delegators' => [
        'cli-commands' => [
            new class implements DelegatorFactoryInterface {
                public function __invoke(InteropContainer $container, $name, callable $callback, array $options = null)
                {
                    return array_merge($callback(), [$container->get(Greet::class)]);
                }
            },
            new class implements DelegatorFactoryInterface {
                public function __invoke(InteropContainer $container, $name, callable $callback, array $options = null)
                {
                    return array_merge($callback(), [$container->get(SayHello::class)]);
                }
            },
        ],
    ],
]);
