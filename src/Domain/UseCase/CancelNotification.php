<?php

declare(strict_types=1);

namespace App\Domain\UseCase;

use App\Domain\Exception\NotificationNotFound;
use App\Domain\Repository\NotificationRepository;

class CancelNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    public function execute(string $notificationId): void
    {
        $notification = $this->repository->findById($notificationId);

        if (!$notification) {
            throw new NotificationNotFound();
        }

        $notification->cancel();
        $this->repository->save($notification);
    }
}
