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
class addkontoCommand extends Command
{

    public function configure()
    {
        $this->setName('konto:add')
            ->setDescription('Add konto command')
            ->setHelp('add konto ')
            ->addArgument('konto_inhaber', InputArgument::REQUIRED, 'konto Inhaber')
            ->addArgument('konto_nummer', InputArgument::REQUIRED, 'The konto nummer');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $konto_inhaber = $input->getArgument('konto_inhaber');

        $konto_nummer = $input->getArgument('konto_nummer');

        $konto = new KontoController();

        $konto_new = $konto->addkonto($konto_inhaber, $konto_nummer);

        $output->writeln($konto_new);

        return Command::SUCCESS;
    }
}
