<?php

namespace App\MessageHandler;

use App\Message\CommentMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CommentMessageHandler
{
    public function __invoke(CommentMessage $message)
    {
        // do something with your message
    }

}
