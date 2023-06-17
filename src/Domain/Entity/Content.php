<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use DomainException;

class Content
{
    private string $content;

    public function __construct(string $content)
    {
        if (!$this->isValidContentLength($content)) {
            throw new DomainException('Content length error.');
        }

        $this->content = $content;
    }

    public function __toString(): string
    {
        return $this->content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    private function isValidContentLength(string $content): bool
    {
        return strlen($content) >= 5 && strlen($content) <= 248;
    }
}
