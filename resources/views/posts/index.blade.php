<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>読書記録</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>新規作成</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>{{ $post->title }}</h2>
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach
            
            @section('content')
            <h2>アカウント作成</h2>
            
            <foem method="POST" action="{{ url('/signup') }}">
            　　@csrf
                //フォームの入力項目
                
                <button type="submit">アカウント作成</button> 
            </foem>
            @endsection
        </div>
        <div class='paginate'>
            {{ $posts->links(1) }}
        </div>
    </body>
</html>