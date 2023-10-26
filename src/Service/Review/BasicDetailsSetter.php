<?php

namespace App\Service\Review;

use App\Entity\Review;

class BasicDetailsSetter
{
    public function set(Review $review, array $data): void
    {
        $review->setType('Review');
        $review->setDescription($data['description'] ?? '');
        $review->setPhone($data['phone'] ?? '');
        $review->setCreatedAt(new \DateTime($data['createdAt'] ?? 'now'));
    }
}
