<?php

namespace App\Tests\Service\FaultReport;

use App\Service\FaultReportPopulator;
use App\Service\FaultReport\BasicDetailsSetter;
use App\Service\FaultReport\PrioritySetter;
use App\Service\FaultReport\DueDateSetter;
use App\Service\FaultReport\StatusSetter;
use App\Service\FaultReport\ServiceRemarksSetter;
use App\Entity\FaultReport;
use PHPUnit\Framework\TestCase;

class FaultReportPopulatorTest extends TestCase
{
    private $basicDetailsSetter;
    private $prioritySetter;
    private $dueDateSetter;
    private $statusSetter;
    private $serviceRemarksSetter;
    private $faultReportPopulator;

    protected function setUp(): void
    {
        $this->basicDetailsSetter = $this->createMock(BasicDetailsSetter::class);
        $this->prioritySetter = $this->createMock(PrioritySetter::class);
        $this->dueDateSetter = $this->createMock(DueDateSetter::class);
        $this->statusSetter = $this->createMock(StatusSetter::class);
        $this->serviceRemarksSetter = $this->createMock(ServiceRemarksSetter::class);

        $this->faultReportPopulator = new FaultReportPopulator(
            $this->basicDetailsSetter,
            $this->prioritySetter,
            $this->dueDateSetter,
            $this->statusSetter,
            $this->serviceRemarksSetter
        );
    }

    public function testPopulate(): void
    {
        $faultReport = new FaultReport();
        $data = ['some_key' => 'some_value'];

        $this->basicDetailsSetter->expects($this->once())
            ->method('set')
            ->with($faultReport, $data);

        $this->prioritySetter->expects($this->once())
            ->method('set')
            ->with($faultReport, $data);

        $this->dueDateSetter->expects($this->once())
            ->method('set')
            ->with($faultReport, $data);

        $this->statusSetter->expects($this->once())
            ->method('set')
            ->with($faultReport, $data);

        $this->serviceRemarksSetter->expects($this->once())
            ->method('set')
            ->with($faultReport, $data);

        $this->faultReportPopulator->populate($faultReport, $data);
    }
}
