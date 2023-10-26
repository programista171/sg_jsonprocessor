<?php

namespace App\Service\FaultReport;

use App\Entity\FaultReport;

class FaultReportPopulator
{
    private $basicDetailsSetter;
    private $prioritySetter;
    private $dueDateSetter;
    private $statusSetter;
    private $serviceRemarksSetter;

    public function __construct(
        BasicDetailsSetter $basicDetailsSetter,
        PrioritySetter $prioritySetter,
        DueDateSetter $dueDateSetter,
        StatusSetter $statusSetter,
        ServiceRemarksSetter $serviceRemarksSetter
    ) {
        $this->basicDetailsSetter = $basicDetailsSetter;
        $this->prioritySetter = $prioritySetter;
        $this->dueDateSetter = $dueDateSetter;
        $this->statusSetter = $statusSetter;
        $this->serviceRemarksSetter = $serviceRemarksSetter;
    }

    public function populate(FaultReport $faultReport, array $data): void
    {
        // Populate basic details like description, phone, and createdAt.
        $this->basicDetailsSetter->set($faultReport, $data);

        // Populate priority based on description.
        $this->prioritySetter->set($faultReport, $data);

        // Populate due date if available.
        $this->dueDateSetter->set($faultReport, $data);

        // Populate status based on due date.
        $this->statusSetter->set($faultReport, $data);

        // Populate service remarks if available.
        $this->serviceRemarksSetter->set($faultReport, $data);
    }
}
