<?php

declare(strict_types=1);

namespace Example\Cli;

use Example\Dependency\VerySlowDatabase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class QueryDatabase extends Command
{
    /**
     * @var VerySlowDatabase
     */
    private $database;

    public function __construct(VerySlowDatabase $database)
    {
        parent::__construct();

        $this->database = $database;
    }

    protected function configure()
    {
        $this->setName('example:query-database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>' . $this->database->query() . '</info>');
    }
}
