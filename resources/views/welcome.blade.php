<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .change-btns{
            margin-top: 10px;

            }
            #edit{
             display: inline-block;

            }
            .delete{
                display: inline-block;
                height: 32px;
                width: 107px;
            }
            #del,#edt{
                height: 32px;
                width: 107px;
                margin-right:20px;
            }
        </style>
    </head>
    <body>
    <h1>Welcome to the homepage</h1>
    <?php
    $blogs = App\Blog::all();
    ?>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                <div class="container">
                    <a href="{{route('create')}}">Create blog</a>
                    @if(count($blogs)>0)
                        @foreach($blogs as $blog)
                            <div class="well">
                                <div class="row">

                                    <div class="col-md-8 col-sm-8">
                       <h1> {{$blog->title}}</h1>
                                        {{$blog->body}}

                                        <div class="change-btns">
                                            <div class="delete">
                                        <form method="post" action='/delete'>
                                            @csrf
                                            <input type="hidden" value="{{$blog->id}}" name="id"/>
                                            <button type="submit" id="del">click to delete</button>
                                        </form>
                                            </div>
                                            <div id="edit">
                                        <form method="post" action='/edit' >
                                            @csrf
                                            <input type="hidden" value="{{$blog->id}}" name="id"/>
                                            <button type="submit" id="edt">click to edit</button>
                                        </form>
                                            </div>
                                        </div>

                                    </div>
                                    <h6>Written on {{$blog->created_at}} by {{$blog->user->name}}</h6>
                                </div>

                                <hr>
                                @endforeach
                            </div>
                            @else
                                <p>There are not blogs posted yet</p>
                            @endif
                </div>



            </div>

    </body>
</html>
