<?php

namespace App\Tests\Service;

use App\Service\Review\DateDetailsSetter;
use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class DateDetailsSetterTest extends TestCase
{
    private $dateDetailsSetter;

    protected function setUp(): void
    {
        $this->dateDetailsSetter = new DateDetailsSetter();
    }

    public function testSetWithDueDate(): void
    {
        $review = new Review();
        $data = [
            'dueDate' => '2022-01-15'
        ];

        $this->dateDetailsSetter->set($review, $data);

        $this->assertEquals(new \DateTime('2022-01-15'), $review->getDueDate());
        $this->assertEquals(2, $review->getWeekOfYear());  // 15th Jan 2022 falls in the 2nd week of the year
    }

    public function testSetWithoutDueDate(): void
    {
        $review = new Review();
        $data = [];

        $this->dateDetailsSetter->set($review, $data);

        $this->assertNull($review->getDueDate());
        $this->assertNull($review->getWeekOfYear());
    }
}
