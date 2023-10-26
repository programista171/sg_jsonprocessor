<?php

namespace App\Service\FaultReport;

use App\Entity\FaultReport;

class BasicDetailsSetter implements EntityFieldSetter
{
    /**
     * Set the basic details of a FaultReport entity.
     *
     * @param FaultReport $faultReport The FaultReport entity to populate.
     * @param array $data The data used for populating the entity.
     */
    public function set(FaultReport $faultReport, array $data): void
    {
        $faultReport->setType('FaultReport');
        $faultReport->setDescription($data['description'] ?? '');
        $faultReport->setPhone($data['phone'] ?? '');
        $faultReport->setCreatedAt(new \DateTime($data['createdAt'] ?? 'now'));
    }
}
