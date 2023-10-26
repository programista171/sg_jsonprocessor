<?php

namespace App\Service\Review;

use App\Entity\Review;

class StatusSetter
{
    public function set(Review $review, array $data): void
    {
        $review->setStatus(isset($data['dueDate']) ? 'Scheduled' : 'New');
    }
}
