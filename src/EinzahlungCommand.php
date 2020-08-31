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
class EinzahlungCommand extends Command
{

    public function configure()
    {
        $this->setName('einzahlen')
            ->setDescription('einzahlung command')
            ->setHelp('das command ist fuer die Einzahlung')
            ->addArgument('beitrag', InputArgument::REQUIRED, 'your beitrag')
            ->addArgument('konto_nummer', InputArgument::REQUIRED, 'The konto nummer');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $beitrag = $input->getArgument('beitrag');

        $konto_nummer = $input->getArgument('konto_nummer');

        $konto = new KontoController();

        $einzahlung = $konto->Einzahlen($beitrag, $konto_nummer);

        $output->writeln($einzahlung);

        return Command::SUCCESS;
    }
}
