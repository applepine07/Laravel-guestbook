<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    /**
     * 顯示訊息列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取出指定的資料表中的所有的資料
        $messages=DB::table('messages')->get();

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
        //使用DB類別直接將表單傳來的資料新增進資料表
        DB::table('messages')->insert(['user'=>$request->user,'message'=>$request->message]);

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
        //根據網址傳來的id變數來取出留言資料
        $message=DB::table('messages')->find($id);

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
        //根據網址帶入的$id及表單資料中的name及message來更新資料
        DB::table("messages")->where('id',$id)
                             ->update(['user'=>$request->user,'message'=>$request->message]);

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
        //依據網址傳來的id值來進行刪除
        DB::table('messages')->where('id',$id)
                             ->delete();

        //刪除完成後將網址導向留言列表
        return redirect('/');
    }
}
