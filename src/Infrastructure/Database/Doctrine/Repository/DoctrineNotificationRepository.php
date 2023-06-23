<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\Doctrine\Repository;

use App\Domain\Entity\Notification;
use App\Domain\Exception\GenericNotificationException;
use App\Domain\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

final class DoctrineNotificationRepository implements NotificationRepository
{
    private const ENTITY = Notification::class;

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @throws GenericNotificationException
     */
    public function save(Notification $notification): void
    {
        try {
            $this->entityManager->persist($notification);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            throw new GenericNotificationException($exception);
        }
    }

    public function findById(string $notificationId): ?Notification
    {
        return $this->entityManager
            ->getRepository(self::ENTITY)
            ->find($notificationId);
    }

    public function findManyByRecipientId(string $recipientId): iterable
    {
        return $this->entityManager
            ->getRepository(self::ENTITY)
            ->findBy([
                'recipientId' => $recipientId,
            ]);
    }
}
