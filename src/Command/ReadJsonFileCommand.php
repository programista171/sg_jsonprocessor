<?php

// src/Command/ReadJsonFileCommand.php

namespace App\Command;

use App\Service\JsonFileReaderInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ReadJsonFileCommand extends Command
{
    protected static $defaultName = 'app:read-json';

    private $jsonFileReader;

    public function __construct(JsonFileReaderInterface $jsonFileReader)
    {
        $this->jsonFileReader = $jsonFileReader;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Reads a JSON file.')
            ->setHelp('This command allows you to read a JSON file.')
            ->addArgument('filePath', InputArgument::REQUIRED, 'The path to the JSON file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        try {
            $jsonData = $this->jsonFileReader->read($filePath);
            $output->writeln('JSON file read successfully.');
            $output->writeln(json_encode($jsonData, JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            $output->writeln('<error>Error: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
