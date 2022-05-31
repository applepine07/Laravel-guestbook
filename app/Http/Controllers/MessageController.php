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
        return view('list_message');
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
        //
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
        //
    }

    /**
     * 從資料表中刪除指定的訊息.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
