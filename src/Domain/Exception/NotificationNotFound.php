<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use RuntimeException;
use Throwable;

class NotificationNotFound extends RuntimeException
{
    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        if (null === $message) {
            $message = 'Notification not found.';
        }

        parent::__construct($message, $code, $previous);
    }
}
