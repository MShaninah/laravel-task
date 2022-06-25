<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="form-container flex">
    <form action="/articles/{{$article->id}}" class="flex" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Create an Article</h1>
        <label for="title">
            <div>Edit Article</div>
            <input required type="text" id="title" name="title" value="{{$article->title}}">
        </label>
        <label for="description">
            <div>Beschreibung des Artikels</div>
            <input required type="text" name="description" id="description" value="{{$article->body}}">
        </label>
        <label for="image">
            <div>Image des Artikels</div>
            <input required type="file" name="image" id="image" title=" " value="{{$article->image}}">
        </label>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
