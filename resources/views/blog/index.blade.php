<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="ha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6">
            @if (!session('email'))
                    <a href="signUp" class="btn  float-right">SignUp</a>
                    <a href="login" class="btn  float-right">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{action('UserController@logout')}}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger float-right" >Log out</button>
                </form>
            @endif
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                @if(session('role'))
                    <li class="breadcrumb-item">
                        <a href="{{route('profile1')}}">Profile</a>
                @endif
                <li class="breadcrumb-item active" aria-current="page">
                    Blogs
                </li>
            </ol>
        </nav>
        <div class="title m-b-md">
        </div>
            <div class="container-fluid">
                <div class="row" style="background-color: transparent" >
                    <div class="col-md-2" style="background-color: transparent">
                    </div>
                    <div class="col-md-6">
                    @foreach($blog as $b)
                        @if($b->content)
                            <div class="contentBlog">
                                <div class="comment-header">
                                    <div class="pull-left">
                                        blog {{$b->id}}
                                        <div class="date">
                                            {{$b->created_at}}
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{route('blogs.show',['id'=> $b->id])}}" class="btn btn-primary pull-right">View Blog</a>
                                        @if($b->user_id === session('user_id') and (!session('role')))
                                            <a href="{{action('BlogController@edit', $id = $b->id)}}" class="btn btn-warning pull-right" >Edit</a>
                                            <form action="{{action('BlogController@destroy', $id = $b->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger pull-right" type="submit">Delete</button>
                                            </form>
                                        @endif
                                        @if(session('role'))
                                            <form action="{{action('BlogController@destroy', $id = $b->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <td>
                                                    <button class="btn btn-danger pull-right" type="submit">Delete</button>
                                                </td>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="contentUser">
                                    {{$b->author}}
                                </div>
                                <div>
                                    <div class="blogDetail" style="background-color: #e0dedc">
                                        <div style="font-size: small">
                                            <span>
                                               {{$b->title}}
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                {{$b->content}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="frame-comment">
                                    <div class="blog-comment">
                                        <div style="padding: 0.3em;">
                                            <div>
                                                @if(session('user_id'))
                                                    <tr>
                                                        <td>
                                                            <form action="{{action('CommentController@update', $id=$b->id)}}" id="comment" method="POST">
                                                                {{csrf_field()}}
                                                                {{ method_field('PATCH')}}
                                                                <input name="_method" value="PATCH" type="hidden">
                                                                <div>
                                                                    <input type="text" class="form-control" name="comment" id="comment" style="border-color: #e0dedc;border-radius: 5px"/>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </div>
                                            <div style="float:right">
                                                {{$b->commentsCount->first()->aggregate}}Comments
                                            </div>
                                            <div style="float: left">
                                                {{$b->emotions()->count()}}
                                                <a href="{{action('EmotionController@show', $id=$b->id)}}">Like</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                            {{ $blog->links() }}
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <div class="content">
            </div>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                console.log('sdgsdg');
                //  $('input[type="text"]').addClass('highLight');
                $.ajax
                (
                    {
                        dataType: 'json',
                        url:'getBlog',
                        success:function(data){
                            $.each(data,function (i,value)
                            {
                                var tr =$("<tr/>");
                                tr.append($("<td/>",
                                    {
                                        text : " Title la :" + value.title + " content la : " + value.content
                                    }))
                                $('#blogPost').prepend(tr);
                            })
                        },
                        error: function (jqXhr,textStatus,errorMessage)
                        {
                            $('#blogPost').append('Error')
                        }
                    }
                )
            })
        </script>
    </body>
</html>