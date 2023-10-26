<?php

namespace App\Service\FaultReport;

use App\Entity\FaultReport;

class PrioritySetter implements EntityFieldSetter
{
    /**
     * Set the priority of a FaultReport entity based on its description.
     *
     * @param FaultReport $faultReport The FaultReport entity to populate.
     * @param array $data The data used for populating the entity.
     */
    public function set(FaultReport $faultReport, array $data): void
    {
        $description = $data['description'] ?? '';

        if (strpos($description, 'very urgent') !== false) {
            $faultReport->setPriority('critical');
        } elseif (strpos($description, 'urgent') !== false) {
            $faultReport->setPriority('high');
        } else {
            $faultReport->setPriority('normal');
        }
    }
}
