<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use Symfony\Component\Uid\Uuid;

class Notification
{
    public function __construct(
        private Uuid $id,
        private string $recipientId,
        private Content $content,
        private string $category,
        private ?\DateTimeInterface $readAt = null,
        private ?\DateTimeInterface $canceledAt = null,
        private \DateTimeImmutable $createdAt
    ) {
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function recipientId(): string
    {
        return $this->recipientId;
    }

    public function setRecipientId(string $recipientId): void
    {
        $this->recipientId = $recipientId;
    }

    public function content(): string
    {
        return $this->content->getContent();
    }

    public function setContent(Content $content): void
    {
        $this->content = $content;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function readAt(): ?\DateTimeInterface
    {
        return $this->readAt;
    }

    public function read(): void
    {
        $this->readAt = new \DateTime();
    }

    public function unread(): void
    {
        $this->readAt = null;
    }

    public function canceledAt(): ?\DateTimeInterface
    {
        return $this->canceledAt;
    }

    public function cancel(): void
    {
        $this->canceledAt = new \DateTime();
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}
