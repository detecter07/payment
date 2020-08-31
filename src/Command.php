<?php

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\controllers\KontoController;

/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 */
class Command extends SymfonyCommand
{

    public function __construct()
    {
        parent::__construct();
    }
    protected function greetUser(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            '====**** User Greetings Console App ****====',
            '==========================================',
            '',
        ]);

        // outputs a message without adding a "\n" at the end of the line
        $output->writeln($this->getGreeting() . ', ' . $input->getArgument('username'));
        $output->writeln($this->getGreeting() . ',' . $input->getArgument('konto_nummer'));
    }
}
