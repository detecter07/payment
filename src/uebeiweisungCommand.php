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
class uebeiweisungCommand extends Command
{

    public function configure()
    {
        $this->setName('ueberweisung')
            ->setDescription('Greet a user based on the time of the day.')
            ->setHelp('This command allows you to greet a user based on the time of the day...')
            ->addArgument('beitrag', InputArgument::REQUIRED, 'your beitrag')
            ->addArgument('konto_src', InputArgument::REQUIRED, 'konto from')
            ->addArgument('konto_ziel', InputArgument::REQUIRED, 'to konto');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $beitrag = $input->getArgument('beitrag');

        $konto_src = $input->getArgument('konto_src');

        $konto_ziel = $input->getArgument('konto_ziel');


        $konto = new KontoController();

        $ueberweisung = $konto->ueberweisung($beitrag, $konto_src,$konto_ziel);

        $output->writeln($ueberweisung);

        return Command::SUCCESS;
    }
}
