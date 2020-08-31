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
class AuszahlungCommand extends Command
{

    public function configure()
    {
        $this->setName('auszahlen')
            ->setDescription('Geld auszahlen')
            ->setHelp('das Command ist für die Auszahlung')
            ->addArgument('beitrag', InputArgument::REQUIRED, 'dein beitrag')
            ->addArgument('konto_nummer', InputArgument::REQUIRED, 'dein konto nummer ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $beitrag = $input->getArgument('beitrag');

        $konto_nummer = $input->getArgument('konto_nummer');

        $konto = new KontoController();

        $auszahlung = $konto->Auszahlen($beitrag, $konto_nummer);

        $output->writeln($auszahlung);

        return Command::SUCCESS;
    }
}
