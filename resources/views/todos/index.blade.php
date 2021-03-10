<!Doctype html>
<html lang="ja">
        <haad>
        <meta charset="utf-8">
    <title></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
        integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    </head>
     
    <body style="background:#FFE4E1">
        <div style="width:95%;margin:30px auto;">
            <h1>Todoメモアプリ</h1>
            <form action="/todo/create/" method="post">
                <div style="width:50%;margin:0 0 0 auto;">
                {{csrf_field() }}
                <label><input type="text" name="task" placeholder="やること"style="width: 200%;padding: 10px 15px;font-size: 16px;border-radius: 5px;border: 2px solid #ddd;box-sizing: border-box;"></label>
                <input type="submit" name="submit" value="追加" class="btn btn-info"style="margin:0 205px">
                </div>
            </form>

            <table class="table table-striped " style="background:#fff;">
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
                        <div style="margin:10px 0">
                        <a class="btn btn-success text-white" data-toggle="modal" data-target="#Edit" data-whatever="{{$todoList->id}}">編集</a>                
                        </div>
                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#Delete" data-whatever="{{$todoList->id}}">削除</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/todo/edit/{{$todoList->id}}" method="post">
                            <div class="modal-header">
                                <h4><div class="modal-title" id="myModalLabel">編集画面</div></h4>
                            </div>
                            <div class="modal-body" style="height:170px">
                                <label class="modal-label"></label>
                                <br><textarea name="content" style="width:400px;height:70px;margin:20px 0"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>                                
                                {{csrf_field() }}                                                      
                                <input type="submit" value="編集" class="btn btn-success">                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- モーダルウィンドウ時のパラメーター引継ぎ -->
            <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><div class="modal-title" id="myModalLabel">削除確認画面</div></h4>
                        </div>
                        <div class="modal-body">
                            <label class="modal-label"></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                <form action="/todo/delete/{{$todoList->id}}" method="post">
                                {{csrf_field() }}
                                <input type="submit" value="削除" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

        <script>
            $('#Edit').on('show.bs.modal', function (event) {
            var Editbutton = $(event.relatedTarget)
            var Editrecipient = Editbutton.data('whatever')          
            $(this).find('.modal-label').text('No.'+Editrecipient+'のデータを編集しています')  
            $('form').attr('action','/todo/edit/'+Editrecipient);
            })

            $('#Delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            $(this).find('.modal-label').text('No.'+recipient+'のデータを削除しますか？')
            $('form').attr('action','/todo/delete/'+recipient);
            })
        </script>


    </body>
</html>