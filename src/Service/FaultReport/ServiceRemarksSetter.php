<?php

namespace App\Service;

use App\Entity\FaultReport;

class ServiceRemarksSetter
{
    /**
     * Set the service remarks of a FaultReport entity.
     *
     * @param FaultReport $faultReport The FaultReport entity to populate.
     * @param array $data The data used for populating the entity.
     */
    public function set(FaultReport $faultReport, array $data): void
    {
        $serviceRemarks = $data['serviceRemarks'] ?? '';
        $faultReport->setServiceRemarks($serviceRemarks);
    }
}
