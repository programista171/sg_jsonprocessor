<?php

namespace App\Factory;

use Psr\Log\LoggerInterface;
use App\Entity\Review;
use App\Entity\FaultReport;
use App\Service\ReviewPopulator;
use App\Service\FaultReportPopulator;

class EntityFactory
{
    private $reviewPopulator;
    private $faultReportPopulator;
    private $logger;

    public function __construct(ReviewPopulator $reviewPopulator, FaultReportPopulator $faultReportPopulator, LoggerInterface $logger)
    {
        $this->reviewPopulator = $reviewPopulator;
        $this->faultReportPopulator = $faultReportPopulator;
        $this->logger = $logger;
    }

    /**
     * Create and populate a Review entity.
     * 
     * @param array $data Data to populate the entity.
     * @return Review Populated Review entity.
     */
    public function createReview(array $data): Review
    {
        $this->logger->info("Creating a Review entity.");
        $review = new Review();
        $this->reviewPopulator->populate($review, $data);
        return $review;
    }

    /**
     * Create and populate a FaultReport entity.
     * 
     * @param array $data Data to populate the entity.
     * @return FaultReport Populated FaultReport entity.
     */
    public function createFaultReport(array $data): FaultReport
    {
        $this->logger->info("Creating a FaultReport entity.");
        $faultReport = new FaultReport();
        $this->faultReportPopulator->populate($faultReport, $data);
        return $faultReport;
    }

    // Future methods for creating other entity types can go here
}
