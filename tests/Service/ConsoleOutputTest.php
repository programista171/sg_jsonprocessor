<?php

namespace App\Tests\Service;

use App\Service\ConsoleOutputService;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleOutputServiceTest extends TestCase
{
    private $logger;
    private $output;
    private $consoleOutputService;

    protected function setUp(): void
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->output = $this->createMock(OutputInterface::class);
        $this->consoleOutputService = new ConsoleOutputService($this->logger);
    }

    public function testPrintSummary(): void
    {
        // Arrange
        $totalRecords = 10;
        $totalFaultReports = 5;
        $totalReviews = 4;
        $unprocessedCount = 1;

        // Mock logger and output behaviors
        $this->logger->expects($this->once())
            ->method('info')
            ->with(
                'Summary printed to console.',
                $this->equalTo([
                    'totalRecords' => $totalRecords,
                    'totalFaultReports' => $totalFaultReports,
                    'totalReviews' => $totalReviews,
                    'unprocessedCount' => $unprocessedCount,
                ])
            );

        $this->output->expects($this->exactly(4))
            ->method('writeln');

        // Act
        $this->consoleOutputService->printSummary(
            $totalRecords,
            $totalFaultReports,
            $totalReviews,
            $unprocessedCount,
            $this->output
        );
    }

public function testPrintSummaryWithException(): void
{
    // Arrange
    $this->output->expects($this->once())
        ->method('writeln')
        ->willThrowException(new \Exception('An error occurred'));

    $this->logger->expects($this->once())
        ->method('error')
        ->with('Failed to print summary to console.', ['error' => 'An error occurred']);

    // Act
    $this->consoleOutputService->printSummary(0, 0, 0, 0, $this->output);
}
}
