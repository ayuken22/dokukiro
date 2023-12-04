<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>読書記録アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <a href='/posts/create'>create</a>
    </head>
    <body>
        <h1>読書記録</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>{{ $post->title }}</h2>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            </div>
            @endforeach
        <h2 class='title'>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>