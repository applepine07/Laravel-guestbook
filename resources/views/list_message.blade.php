<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言列表</title>
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
        .user .label,.message .label{
            padding:0.5rem;
            font-size:0.9rem;
        }
        .message div{
            margin:0.2rem 0.4rem;
        }
        hr{
            margin:1rem auto;
        }
        body{
            width:65%;
            margin:auto;
            padding:1rem
        }
        .right{
            text-align: right;
        }
        .flex{
            display:flex;
            justify-content: end;
        }
    </style>
</head>
<body>
    <h1>留言板</h1>
    <button onclick="location.href='/message'">我要留言</button>
    <hr>
    @foreach($messages as $message)

        <div class="wrap">
            <div class="user">
                <span class="label">留言者：</span>
                <span>{{ $message->user }}</span>
            </div>
            <div class="message">
                <span class="label">留言內容：</span>
                <div>{!! nl2br($message->message) !!}</div>
            </div>
            <div class="right flex">
                <button onclick="location.href='/message/{{$message->id}}'">編輯留言</button>
                <form action="/message/{{$message->id}}" method="post">
                    <!--使用laravel提供的方法欺騙來偽裝一個delete的請求-->
                    @method('delete')
                    @csrf
                    <input type="submit" value="刪除留言">
                </form>
                
            </div>
        </div>

    @endforeach
</body>
</html>