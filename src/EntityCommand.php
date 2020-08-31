<?php

namespace Console;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\controllers\KontoController;

use App\database\EinzahlungSeader;



/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 */
class EntityCommand extends Command
{

    public function configure()
    {
        $this->setName('generate:einzahlung')
            ->setDescription('generate entity')
            ->setHelp('This command generate entity');
    }

    public function execute(InputInterface $input=null,OutputInterface $output)
    {

        $konto = new EinzahlungSeader();

        $output->writeln($konto);

        //return Command::SUCCESS;
    }
}
