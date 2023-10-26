<?php

namespace App\Service\Review;

use App\Entity\Review;

class ReviewPopulator
{
    private $basicDetailsSetter;
    private $dateDetailsSetter;
    private $statusSetter;

    public function __construct(
        BasicDetailsSetter $basicDetailsSetter,
        DateDetailsSetter $dateDetailsSetter,
        StatusSetter $statusSetter
    ) {
        $this->basicDetailsSetter = $basicDetailsSetter;
        $this->dateDetailsSetter = $dateDetailsSetter;
        $this->statusSetter = $statusSetter;
    }

    public function populate(Review $review, array $data): void
    {
        $this->basicDetailsSetter->set($review, $data);
        $this->dateDetailsSetter->set($review, $data);
        $this->statusSetter->set($review, $data);
    }
}
