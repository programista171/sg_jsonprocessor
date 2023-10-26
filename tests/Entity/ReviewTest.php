<?php

namespace App\Tests\Entity;

use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    private Review $review;

    protected function setUp(): void
    {
        $this->review = new Review();
    }

    public function testType(): void
    {
        $this->review->setType('Review');
        $this->assertEquals('Review', $this->review->getType());
    }

    public function testDescription(): void
    {
        $this->review->setDescription('Test Description');
        $this->assertEquals('Test Description', $this->review->getDescription());
    }

    public function testDueDate(): void
    {
        $dueDate = new \DateTime('2022-01-01');
        $this->review->setDueDate($dueDate);
        $this->assertEquals($dueDate, $this->review->getDueDate());
    }

    public function testWeekOfYear(): void
    {
        $this->review->setWeekOfYear(1);
        $this->assertEquals(1, $this->review->getWeekOfYear());
    }

    public function testStatus(): void
    {
        $this->review->setStatus('Scheduled');
        $this->assertEquals('Scheduled', $this->review->getStatus());
    }

    public function testRecommendations(): void
    {
        $this->review->setRecommendations('Test Recommendations');
        $this->assertEquals('Test Recommendations', $this->review->getRecommendations());
    }

    public function testPhone(): void
    {
        $this->review->setPhone('123-456-7890');
        $this->assertEquals('123-456-7890', $this->review->getPhone());
    }

    public function testCreatedAt(): void
    {
        $createdAt = new \DateTime('now');
        $this->review->setCreatedAt($createdAt);
        $this->assertEqualsWithDelta($createdAt, $this->review->getCreatedAt(), 1);
    }
}
