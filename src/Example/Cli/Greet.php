<?php

declare(strict_types=1);

namespace Example\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Greet extends Command
{
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
}
