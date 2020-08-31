<?php

namespace Console;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\controllers\KontoController;

use App\database\uebrweisungSeader;



/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 */
class entityuberweisungCommand extends Command
{

    public function configure()
    {
        $this->setName('generate:ueberweisung')
            ->setDescription('generate entity')
            ->setHelp('This command generate entity');
    }

    public function execute(InputInterface $input=null,OutputInterface $output)
    {
        $konto = new uebrweisungSeader();

        $output->writeln($konto);

        //return Command::SUCCESS;
    }
}
