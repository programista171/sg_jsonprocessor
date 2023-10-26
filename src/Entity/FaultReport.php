<?php

namespace App\Entity;

class FaultReport
{
    private string $type;
    private string $description;
    private string $priority;
    private \DateTime $serviceVisitDueDate;
    private string $status;
    private string $serviceNotes;
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

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): void
    {
        $this->priority = $priority;
    }

    public function getServiceVisitDueDate(): \DateTime
    {
        return $this->serviceVisitDueDate;
    }

    public function setServiceVisitDueDate(\DateTime $serviceVisitDueDate): void
    {
        $this->serviceVisitDueDate = $serviceVisitDueDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getServiceNotes(): string
    {
        return $this->serviceNotes;
    }

    public function setServiceNotes(string $serviceNotes): void
    {
        $this->serviceNotes = $serviceNotes;
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
