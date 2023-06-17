<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Notification;

interface NotificationRepository
{
    public function create(Notification $notification): void;

    // public function findById(string $notificationId): ?Notification;

    // public function save(Notification $notification): ?Notification;

    // public function fincountManyByRecipientIddById(string $recipientId): int;

    // public function findManyByRecipientId(string $recipientId): iterable;

    // public function list(): iterable;
}