<?php

declare(strict_types=1);

namespace Example\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class SayHello extends Command
{
    protected function configure()
    {
        $this->setName('example:say-hello');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Hello World!</info>');
    }
}
