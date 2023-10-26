<?php

namespace App\Service;

use App\Factory\EntityFactory;
use App\Service\JsonFileReader;

class EntityProcessingService
{
    private $jsonFileReader;
    private $entityFactory;
    private $reviewPopulator;
    private $faultReportPopulator;

    public function __construct(
        JsonFileReader $jsonFileReader, 
        EntityFactory $entityFactory,
        ReviewPopulator $reviewPopulator,
        FaultReportPopulator $faultReportPopulator
    ) {
        $this->jsonFileReader = $jsonFileReader;
        $this->entityFactory = $entityFactory;
        $this->reviewPopulator = $reviewPopulator;
        $this->faultReportPopulator = $faultReportPopulator;
    }

    public function process(string $filePath): void
    {
        $jsonData = $this->readJsonData($filePath);
        $entities = $this->createAndPopulateEntities($jsonData);

        // Here, $entities contains populated Review and FaultReport entities.
        // You can now save them to a database, write them to a file, etc.
    }

    private function readJsonData(string $filePath): array
    {
        return $this->jsonFileReader->read($filePath);
    }

    private function createAndPopulateEntities(array $jsonData): array
    {
        $reviews = [];
        $faultReports = [];

        foreach ($jsonData as $data) {
            if ($this->isReview($data)) {
                $review = $this->entityFactory->createReview([]);
                $this->reviewPopulator->populate($review, $data);
                $reviews[] = $review;
            } else {
                $faultReport = $this->entityFactory->createFaultReport([]);
                $this->faultReportPopulator->populate($faultReport, $data);
                $faultReports[] = $faultReport;
            }
        }

        return ['reviews' => $reviews, 'faultReports' => $faultReports];
    }

    private function isReview(array $data): bool
    {
        return strpos($data['description'] ?? '', 'Review') !== false;
    }
}
