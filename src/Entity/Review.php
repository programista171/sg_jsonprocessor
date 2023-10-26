<?php

namespace App\Entity;

class Review
{
    private string $type;
    private string $description;
    private \DateTime $dueDate;
    private int $weekOfYear;
    private string $status;
    private string $recommendations;
    private string $phone;
    private \DateTime $createdAt;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getWeekOfYear(): int
    {
        return $this->weekOfYear;
    }

    public function setWeekOfYear(int $weekOfYear): void
    {
        $this->weekOfYear = $weekOfYear;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getRecommendations(): string
    {
        return $this->recommendations;
    }

    public function setRecommendations(string $recommendations): void
    {
        $this->recommendations = $recommendations;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
