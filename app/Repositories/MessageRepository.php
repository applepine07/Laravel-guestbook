<?php
namespace App\Repositories;

use App\Models\Message;

class MessageRepository
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message=$message;
    }

}



?>