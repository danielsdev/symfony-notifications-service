<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use RuntimeException;
use Throwable;

class GenericNotificationException extends RuntimeException
{
    public function __construct(Throwable $previous, ?string $message = null, int $code = 0)
    {
        if (null === $message) {
            $message = 'Unable to save requested notification.';
        }

        parent::__construct($message, $code, $previous);
    }
}
