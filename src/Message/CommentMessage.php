<?php

namespace App\Message;

use Symfony\Component\Messenger\Stamp\StampInterface;

final readonly class CommentMessage
{
    // public StampInterface $stamp;

    public function __construct(
        public int $id,
        public array $context = []
    ) {
    }

    // public function getStamp(): StampInterface
    // {
    //     return $this->stamp;
    // }
}
