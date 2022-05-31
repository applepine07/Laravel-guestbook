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

    public function all()
    {
        return $this->message->all();
    }

    public function insert($formdata)
    {
        $this->message->insert($formdata);
    }

    public function find($id)
    {
        return $this->message->find($id);
    }

    public function update($id,$formdata){

        // 利用這個repository己經寫過的find()來取得資料，而不是直接去向model要資料         
        $message=$this->find($id);
        $message->user=$formdata['user'];
        $message->message=$formdata['message'];

        $message->save();
    }

    public function destroy($id)
    {
        $this->message->destroy($id);
    }

}



?>