<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/view.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container flex">
        @if($articles)
            @foreach($articles as $article)
                <div class="article">
                    <div>
                        <span class="date"><b>{{ date('d-M-Y', strtotime($article->created_at)) }}</b></span>
                        <img alt="" class="article-img" src="{{url('/images/joshua-newton-RPUI6gtn49g-unsplash.jpg')}}">
                        <h3>{{ $article->title }}</h3>
                        <p>{{ $article->body }}</p>
                    </div>
                    <p>
                        <a href="" class="btn">Mehr erfahren</a>
                    </p>
                </div>
            @endforeach
        @else
            <h2>There is no articles to show</h2>
        @endif
    </div>
</body>
</html>
