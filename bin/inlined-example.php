#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application('Example application - inlined version');

$app->add(new class extends Command {
    protected function configure()
    {
        $this->setName('example:say-hello');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Hello World!</info>');
    }
});

$app->add(new class extends Command {
    protected function configure()
    {
        $this->setName('example:greet');
        $this->addArgument('name', InputArgument::REQUIRED, 'Someone to greet');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf(
            '<info>Hello %s!</info>',
            $input->getArgument('name')
        ));
    }
});

$app->run();
