<?php

namespace Console;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\controllers\KontoController;



/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 */
class uebersichtCommand extends Command
{

    public function configure()
    {
        $this->setName('konto:uebersicht')
            ->setDescription('Geld auszahlen')
            ->setHelp('das Command zeigt kontobewegung eines konto')
            ->addArgument('konto_nummer', InputArgument::REQUIRED, 'dein konto nummer ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $konto_nummer = $input->getArgument('konto_nummer');

        $konto = new KontoController();

        $konto_uebersicht = $konto->konto_uebersicht($konto_nummer);

        $output->writeln($konto_uebersicht);

        return Command::SUCCESS;
    }
}
