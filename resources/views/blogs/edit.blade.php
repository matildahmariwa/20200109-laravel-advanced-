<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
<h1>Edit Blog</h1>

<form action={{ action('BlogsController@update') }}  method="post">
    @csrf
    <div>
        <label for=""> title</label>
        <input type="text" name="title" value="{{$blog->title}}">
    </div>
    <input type="hidden" value="{{$blog->id}}" name="id"/>
    <div>
        <label for="">Body</label>
        <textarea name="body" id="" cols="30" rows="10">{{$blog->body}}</textarea>
    </div>
    <div>
        <label for="">Category</label>
        <input name="body" id="" cols="30" rows="10" value="{{$blog->category}}">
    </div>
    <button type="submit">Submit Blog</button>
</form>

</body>
</html>
