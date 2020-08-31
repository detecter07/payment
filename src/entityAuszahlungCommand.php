<?php

namespace Console;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\controllers\KontoController;

use App\database\AusahlungSeader;
use App\Entity\Auszahlung;


/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 */
class entityAuszahlungCommand extends Command
{

    public function configure()
    {
        $this->setName('generate:Auszahlung')
            ->setDescription('generate Auszahlung table')
            ->setHelp('This command generate Auszahlung table');
    }

    public function execute(InputInterface $input,OutputInterface $output)
    {
        $konto = new AusahlungSeader();

        $output->writeln($konto);

        return Command::SUCCESS;
    }
}
