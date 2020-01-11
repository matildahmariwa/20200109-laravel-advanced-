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
<h1>Create Task</h1>
@if($errors)
    @foreach($errors as $err)
        <li class="text-danger">{{$err}}</li>
    @endforeach
@endif
<form action={{ action('BlogsController@store') }}  method="post">
    @csrf
    <div>
        <label for=""> title</label>
        <input type="text" name="title">
    </div>

    <div>
        <label for="">Body</label>
        <textarea name="body" id="" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="">Category</label>
        <input name="category" id="" cols="30" rows="10">
    </div>
    <button type="submit">Submit Blog</button>
</form>

</body>
</html>
