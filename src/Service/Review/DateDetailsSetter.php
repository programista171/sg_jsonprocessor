<?php

namespace App\Service\Review;

use App\Entity\Review;

class DateDetailsSetter
{
    public function set(Review $review, array $data): void
    {
        if (isset($data['dueDate'])) {
            $dueDate = new \DateTime($data['dueDate']);
            $review->setDueDate($dueDate);

            $weekOfYear = (int) $dueDate->format("W");
            $review->setWeekOfYear($weekOfYear);
        }
    }
}
