<?php
namespace App\Services;

use App\Repositories\MessageRepository;

class MessageService
{
    private $msgRepo;

    public function __construct(MessageRepository $msgRepo)
    {
        $this->msgRepo=$msgRepo;
    }


}


?>