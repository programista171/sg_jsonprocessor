<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleOutputService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function printSummary(
        int $totalRecords,
        int $totalFaultReports,
        int $totalReviews,
        int $unprocessedCount,
        OutputInterface $output
    ): void {
        try {
            $output->writeln("Total records processed: $totalRecords");
            $output->writeln("Fault Reports generated: $totalFaultReports");
            $output->writeln("Reviews generated: $totalReviews");
            $output->writeln("Unprocessed records: $unprocessedCount");

            $this->logger->info('Summary printed to console.', [
                'totalRecords' => $totalRecords,
                'totalFaultReports' => $totalFaultReports,
                'totalReviews' => $totalReviews,
                'unprocessedCount' => $unprocessedCount
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Failed to print summary to console.', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
