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
    <form action="/articles" class="flex" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Create an Article</h1>
        <label for="title">
            <div>Titel des Artikels</div>
            <input required type="text" id="title" name="title">
        </label>
        <label for="description">
            <div>Beschreibung des Artikels</div>
            <textarea required type="text" name="description" id="description">

            </textarea>
        </label>
        <label for="image">
            <div>Image des Artikels</div>
            <input required type="file" name="image" id="image" title=" ">
        </label>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
