<!doctype html>
<html lang="ja">
  <head>
    <title>todoリスト</title>
    <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:50px;">
      <h1>Todoリスト追加</h1>

      <form action='{{ url('/todos')}}' method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label >やることを追加してください</label>
          <input type="text" name="body"class="form-control" placeholder="ここにやることを入力してください" style="max-width:1000px;">
        </div>
        <button type="submit" class="btn btn-primary">追加する</button>
      </form>

      <h1 style="margin-top:50px;">Todoリスト</h1>
      <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
        <!-- <thead>
          <tr>
            <th></th><th></th><th></th>
          </tr>
        </thead> -->
        <tbody>
          @foreach ($todos as $todo)
            <tr>
              <td>{{$todo->body}}</td>
              <td>
                <form action="{{ action('TodosController@edit', $todo) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('get') }}
                  <button type="submit" class="btn btn-primary">編集</button>
                </form>
              </td>

              <!-- 削除ボタン -->
              <td>
                <form action="{{url('/todos', $todo->id)}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger">削除</button>
                </form>
              </td>

              <!-- 削除した際にポップ画面で確認をする -->
              <!-- <td>
                <a class="del" data-id="{{ $todo->id }}" href="#">削除</a>
                <form method="post" action='{{ url('/todos', $todo->id) }}' id="form_{{ $todo->id}}">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                </form>
              </td> -->
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      
      
      {{-- オプション2：jQuery、Popper.js、Bootstrap JS --}}
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>