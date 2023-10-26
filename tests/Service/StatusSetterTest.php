<?php

namespace App\Tests\Service;

use App\Service\Review\StatusSetter;
use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class StatusSetterTest extends TestCase
{
    private $statusSetter;

    protected function setUp(): void
    {
        $this->statusSetter = new StatusSetter();
    }

    public function testSetWithDueDate(): void
    {
        $review = new Review();
        $data = [
            'dueDate' => '2022-01-15'
        ];

        $this->statusSetter->set($review, $data);

        $this->assertEquals('Scheduled', $review->getStatus());
    }

    public function testSetWithoutDueDate(): void
    {
        $review = new Review();
        $data = [];

        $this->statusSetter->set($review, $data);

        $this->assertEquals('New', $review->getStatus());
    }
}
