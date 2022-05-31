<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯留言</title>
    <style>
        *{
            box-sizing: border-box;
            margin:0;
            padding:0;
            list-style-type: none;
        }
        h1,h2,h3,h4,h5{
            text-align: center;
            margin:1rem;
        }
        .wrap{
            width:500px;
            padding:1rem;
            border:1px solid #eee;
            box-shadow: 2px 2px 10px #ccc;
            margin:1.5rem auto;
        }
        .user,.message{
            font-size: 1.25rem;
            display:block;
        }
        .user input,.message textarea{
            padding:0.5rem;
            font-size:1rem;
        }
        .center{
            text-align: center;
        }
        
    </style>
</head>
<body>
    <h1>編輯留言</h1>
    <form action="/message/{{$message->id}}" method="post" class="wrap">
        <!--使用laravel提供的方法欺騙來偽裝要使用patch方法來更新資料-->
        @method("patch")
        @csrf
        <label class="user" for="">
            留言者
            <input type="text" name="user" value="{{$message->user}}">
        </label>
        <label class="message" for="">
            訊息內容
            <textarea name="message" style="width:100%;height:10rem;">{{$message->message}}</textarea>
        </label>
        <div class="center">
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>