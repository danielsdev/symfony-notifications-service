<?php

declare(strict_types=1);

namespace App\Domain\UseCase;

use App\Domain\Entity\Content;
use App\Domain\Entity\Notification;
use App\Domain\Repository\NotificationRepository;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;

class SendNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    public function execute(array $data): Notification
    {
        $notification = new Notification(
            Uuid::v4(),
            $data['recipientId'],
            new Content($data['content']),
            $data['category'],
            null,
            null,
            new DateTimeImmutable()
        );

        $this->repository->save($notification);

        return $notification;
    }
}
