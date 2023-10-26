<?php

namespace Tests\App\Entity;

use App\Entity\FaultReport;
use PHPUnit\Framework\TestCase;

class FaultReportTest extends TestCase
{
    private FaultReport $faultReport;

    protected function setUp(): void
    {
        $this->faultReport = new FaultReport();
    }

    public function testType(): void
    {
        $this->faultReport->setType('Fault');
        $this->assertEquals('Fault', $this->faultReport->getType());
    }

    public function testDescription(): void
    {
        $this->faultReport->setDescription('Description Text');
        $this->assertEquals('Description Text', $this->faultReport->getDescription());
    }

    public function testPriority(): void
    {
        $this->faultReport->setPriority('High');
        $this->assertEquals('High', $this->faultReport->getPriority());
    }

    public function testServiceVisitDueDate(): void
    {
        $date = new \DateTime('2023-10-26');
        $this->faultReport->setServiceVisitDueDate($date);
        $this->assertEquals($date, $this->faultReport->getServiceVisitDueDate());
    }

    public function testStatus(): void
    {
        $this->faultReport->setStatus('New');
        $this->assertEquals('New', $this->faultReport->getStatus());
    }

    public function testServiceNotes(): void
    {
        $this->faultReport->setServiceNotes('Service Notes Text');
        $this->assertEquals('Service Notes Text', $this->faultReport->getServiceNotes());
    }

    public function testPhone(): void
    {
        $this->faultReport->setPhone('1234567890');
        $this->assertEquals('1234567890', $this->faultReport->getPhone());
    }

    public function testCreatedAt(): void
    {
        $date = new \DateTime('2023-10-26');
        $this->faultReport->setCreatedAt($date);
        $this->assertEquals($date, $this->faultReport->getCreatedAt());
    }
}
