<!Doctype html>
<html lang="ja">
        <haad>
        <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
     
    <body style="background:#FFE4E1">
    <div style="width:95%;margin:30px auto;">
        <h1>Todoメモアプリ</h1>
        <form action="/todo/create/" method="post">
            <div style="width:50%;margin:0 0 0 auto;">
            {{csrf_field() }}
            <label><input type="text" name="task" placeholder="やること"style="width: 200%;padding: 10px 15px;font-size: 16px;border-radius: 5px;border: 2px solid #ddd;box-sizing: border-box;"></label>
            <input type="submit" name="submit" value="追加" class="btn btn-success"style="margin:0 205px">
            </div>
        </form>

        <table class="table table-striped" style="background:#fff;">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">やること</th>
                <th scope="col">追加日</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todoList)
            <tr>
                <th scope="col">{{$todoList->id}}</th>
                <td>{{$todoList->content}}</td>
                <td>{{$todoList->created_at}}</td>
                <td>
                <form action="/todo/delete/{{$todoList->id}}" method="post">
                    {{csrf_field() }}
                    <input type="submit" value="削除" class="btn btn-danger" onclick="deleteConfirm(this);">
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            <script>
            function deleteConfirm(e){
                'use strict';
                if(confirm('本当に削除してもよろしいですか？')){
                    document.getElementById('form_' + e.dataset.id).submit();
                }
            }
            </script>
    </div>
    </body>
</html>