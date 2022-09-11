<?php

namespace App\Command;

use App\Controller\CarsParserController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleXMLCommand extends Command
{
    protected static $defaultName = 'parser:xml';
    protected static $defaultDescription = 'Парсинг XML файла';
    private CarsParserController $carsParser;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->carsParser = new CarsParserController($doctrine);
        parent::__construct();
    }


    protected function configure()
    {
        $this->addArgument('path', InputArgument::OPTIONAL);
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $extension = ".xml";
        if(strpos($input->getArgument('path'), $extension))
        {
            $xml = file_get_contents($input->getArgument('path'));
        }else{
            $path = 'public/data.xml';
            $output->writeln("Взят дефолтный файл!");
            $xml = file_get_contents($path);
        };

        $output->writeln($this->carsParser->start($xml));

        return Command::SUCCESS;
    }
}