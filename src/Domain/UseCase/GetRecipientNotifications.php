<?php

declare(strict_types=1);

namespace App\Domain\UseCase;

use App\Domain\Repository\NotificationRepository;

class GetRecipientNotifications
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    public function execute(string $recipientId): iterable
    {
        return $this->repository->findManyByRecipientId($recipientId);
    }
}
