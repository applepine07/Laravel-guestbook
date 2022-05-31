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

    public function all()
    {
        return $this->msgRepo->all();
    }

    public function insert($formdata)
    {
        $this->msgRepo->insert($formdata);
    }

    public function find($id)
    {
        return $this->msgRepo->find($id);
    }

    public function update($id,$formdata)
    {
        $this->msgRepo->update($id,$formdata);
    }

    public function destroy($id)
    {
        $this->msgRepo->destroy($id);
    }
}


?>