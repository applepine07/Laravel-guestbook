<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

use App\Services\MessageService;

class MessageController extends Controller
{

    private $msgService;

    public function __construct(MessageService $msgService)
    {
        $this->msgService=$msgService;
    }

    /**
     * 顯示訊息列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取出指定的資料表中的所有的資料
        $messages=$this->msgService->all();

        //將資料以變數名稱messages回傳給blade去使用
        return view('list_message',["messages"=>$messages]);
    }

    /**
     * 顯示新增資料時的表單.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_message');
    }

    /**
     * 儲存一筆新的訊息進資料表
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //在controller的地方..先做資料的檢核.如果留言者及訊息欄位不是空的，才做新增
        if(strlen($request->user) >0 && strlen($request->message)>3)
        {
            $this->msgService->insert(['user'=>$request->user,'message'=>$request->message]);

        }else{

            //如果欄位為空則回傳原本新增表單並附上錯誤訊息
            return view('create_message',['error'=>'欄位不能為空']);
        }
        

        //新增完畢後將網址導回首頁
        return redirect("/");
    }

    /**
     * 顯示單筆訊息.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 顯示編輯單筆資料用的表單.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //請求service去找一個指定id的資料
        $message=$this->msgService->find($id);

        //顯示編輯資料用的頁面並帶入留言資料
        return view('edit_message',["message"=>$message]);
    }

    /**
     * 在資料表中更新指定id的資料.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //根據網址帶入的$id及表單資料中的name及message來請求service更新資料
        $formdata=['user'=>$request->user,'message'=>$request->message];
        $this->msgService->update($id,$formdata);
    
        //更新完成後，將網址導向留言列表
        return redirect('/');
        
    }

    /**
     * 從資料表中刪除指定的訊息.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //依據網址傳來的id值請求service來進行刪除
         $this->msgService->destroy($id);

        //刪除完成後將網址導向留言列表
        return redirect('/');
    }
}
