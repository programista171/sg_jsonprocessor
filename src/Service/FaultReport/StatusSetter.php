<?php

namespace App\Service\FaultReport;

use App\Entity\FaultReport;

class StatusSetter
{
    /**
     * Set the status of a FaultReport entity.
     *
     * @param FaultReport $faultReport The FaultReport entity to populate.
     * @param array $data The data used for populating the entity.
     */
    public function set(FaultReport $faultReport, array $data): void
    {
        if (isset($data['dueDate'])) {
            $faultReport->setStatus('scheduled');
        } else {
            $faultReport->setStatus('new');
        }
    }
}
