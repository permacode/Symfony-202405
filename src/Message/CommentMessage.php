<?php

namespace App\Message;

use Symfony\Component\Messenger\Stamp\StampInterface;

final readonly class CommentMessage
{
    public function __construct(
        public int $id,
        public array $context = [],
    ) {
    }
}
