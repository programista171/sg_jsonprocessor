<?php

namespace App\Tests\Service;

use App\Service\Review\BasicDetailsSetter;
use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class BasicDetailsSetterTest extends TestCase
{
    private $basicDetailsSetter;

    protected function setUp(): void
    {
        $this->basicDetailsSetter = new BasicDetailsSetter();
    }

    public function testSetAllFields(): void
    {
        $review = new Review();
        $data = [
            'description' => 'Test description',
            'phone' => '123-456-7890',
            'createdAt' => '2022-01-01 00:00:00'
        ];

        $this->basicDetailsSetter->set($review, $data);

        $this->assertEquals('Review', $review->getType());
        $this->assertEquals('Test description', $review->getDescription());
        $this->assertEquals('123-456-7890', $review->getPhone());
        $this->assertEquals(new \DateTime('2022-01-01 00:00:00'), $review->getCreatedAt());
    }

    public function testSetWithMissingFields(): void
    {
        $review = new Review();
        $data = [];

        $this->basicDetailsSetter->set($review, $data);

        $this->assertEquals('Review', $review->getType());
        $this->assertEquals('', $review->getDescription());
        $this->assertEquals('', $review->getPhone());
        $this->assertEqualsWithDelta(new \DateTime('now'), $review->getCreatedAt(), 1);
    }
}
