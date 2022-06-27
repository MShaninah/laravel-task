<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/view.css') }}" rel="stylesheet">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3f9e6216ea.js" crossorigin="anonymous"></script>
</head>
<body>
    @if( Auth::user() )
        <a href="articles/create" class="btn new">Neuer Artikel erstellen &rarr;</a>
    @endif
    <div class="container flex">
        @if($articles)

            @foreach($articles as $article)

                <div class="article">

                    @if(Auth::user())
                        <div class="edit-btn">
                            <a href="articles/{{ $article->id }}/edit"><i class="fa-regular fa-pen-to-square"></i></a>

                        </div>
                    @endif

                    @if( Auth::user() )
                        <form action="articles/{{ $article->id }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="delete-btn">
                                <button type="submit" onclick="return confirm('Sind Sie sicher, dass Sie diesen Artikel löschen möchten?')"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </form>
                    @endif

                    <div>
                        <span class="date"><b>{{ date('d-M-Y', strtotime($article->updated_at)) }}</b></span>
                        <img alt="" class="article-img" src="{{asset('images/' . $article->image_path)}}">
                        <h3>{{ $article->title }}</h3>
                        <p> {{ strlen($article->body) > 150 ? substr($article->body,0,150)  . '...' : $article->body }}</p>
                    </div>
                    <p>
                        <a href="/articles/{{$article->id}}" class="btn">Mehr erfahren</a>
                    </p>
                </div>
            @endforeach

        @else
            <h2>There is no articles to show</h2>
        @endif

    </div>
</body>
</html>
