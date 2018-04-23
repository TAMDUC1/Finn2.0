<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="ha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery.columns.min.js')}}"></script>
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.theme.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/classic.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6">
            @if (!session('email'))
                <a href="signUp" class="btn  float-right" style="margin:1px ">SignUp</a>
                <a href="login" class="btn  float-right" style="margin:1px ">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{route('logout')}}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger float-right" style="margin:1px ">Log out</button>
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
            <div class="container-fluid">
                <div class="row" style="background-color: transparent" >
                    <div class="col-sm-4" style="background-color: transparent">
                    </div>
                    <div class="col-sm-4" style="background-color: transparent">
                        @foreach($blog as $b)
                            <div id="post" data-postid = "{{ $b->id }}">
                                @if($b->content)
                                    <div class="contentBlog" data-postid = "a">
                                        <div class="comment-header" data-postid = "b">
                                            <div class="pull-left" data-postid = "c">
                                                blog {{$b->id}}
                                                <div class="date">
                                                    {{$b->created_at}}
                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{route('blogs.show',['id'=> $b->id])}}" class="btn btn-primary pull-right" style="margin:1px ">View Blog</a>
                                                <a href="{{route('showComment',['id'=> $b->id])}}" class="btn btn-primary pull-right" style="margin:1px ">View Comments</a>
                                            @if($b->user_id === session('user_id') and (!session('role')))
                                                        <a href="{{action('BlogController@edit', $id = $b->id)}}" class="btn btn-warning pull-right" style="margin:1px ">Edit</a>
                                                        <form action="{{action('BlogController@destroy', $id = $b->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-danger pull-right" type="submit" style="margin:1px ">Delete</button>
                                                        </form>
                                                    @endif
                                                    @if(session('role'))
                                                    <form action="{{action('BlogController@destroy', $id = $b->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <td>
                                                            <button class="btn btn-danger pull-right" type="submit" style="margin: 1px">Delete</button>
                                                        </td>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="contentUser">
                                            {{$b->author}}
                                        </div>
                                        <div>
                                            <div class="blogDetail" style="background-color: #e0dedc ;border-radius: 5px">
                                                <div style="font-size: small">
                                                    <span>
                                                       {{$b->title}}
                                                    </span>
                                                </div>
                                                <div class="blog_content">
                                                    <span>
                                                        {{$b->content}}
                                                        <div><p txt=newfile.txt></p></div>
                                                        {{--asset($b->content.'.txt')}}
                                                        {{asset($b->content.'.txt')--}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="frame-comment" data-postid = "d">
                                            <div class="blog-comment" data-postid = "e">
                                                <div style="padding: 0.3em;" data-postid = "f">
                                                    @if(session('user_id'))
                                                        <tr data-postid = "t">
                                                            <td data-postid = "g">
                                                                <form  class="comment" id="comment{{$b->id}}" data-id="{{$b->id}}" method="post" type="hidden">
                                                                    {{csrf_field()}}
                                                                        <input type="text"  name="comment" id="input{{$b->id}}" style="border-color: #669fe0;border-radius: 5px;width: 100%"/>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                        <div style="float:right" data-postid ="g2">
                                                            <span id="blogCommentCount{{$b->id}}" data-postid = "h">
                                                                {{$b->comments()->count()}}
                                                            </span>
                                                            <a data-id="{{$b->id}}" class="test" href="#{{$b->id+1}}">Comments</a>
                                                            <div class="testdiv" id="{{$b->id+1}}" >
                                                                <div id="com" class="collapse"></div>
                                                            </div>
                                                        </div>
                                                        <div style="float: left" >
                                                            <span>{{$b->emotions()->count()}}</span>
                                                            <a href="#" class="like10" id="register10" data-id="{{$b->id}}">Likes</a>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        {{ $blog->links() }}
                    </div>
                    <div class="col-sm-4" id="show" style="background-color: #f5f8ff">
                        @foreach($blog as $b)
                            <div id="show{{$b->id}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            <div class="content">
            </div>
        <script type="text/javascript">
            var storageInfo = null;
            if(navigator.webkitTemporaryStorage) {
                storageInfo = navigator.webkitTemporaryStorage;
            } else if(navigator.webkitPersistentStorage) {
                storageInfo = navigator.webkitPersistentStorage;
            } else if (window.webkitStorageInfo) {
                storageInfo = window.webkitStorageInfo;
            }
            $(document).ready(function ()
            {
                $('.testdiv').hide();
                $('#columns').hide();
                $('.test').click(function() {
                   // event.preventDefault();
                    var _this = $(this);
                    var params = _this.data();
                    var id = params.id + 1 ;
                    var obj, dbParam, xmlhttp, myObj, x, txt,txt1,y = " ";
                    $.ajax({
                        method: "GET",
                        url: "/comments/" + params.id,
                        data: {},
                        success: function (data) {
                            data1 = $.parseJSON(data);
                            data2 = data1.data;
                            var json = data2;
                            $('#'+id).columns({
                               data:json
                            });
                            $('#com').columns({
                                data:json
                            });
                            txt += "<table class=\"table table-striped\">"
                            txt += "<tr><th>AUTHOR</th>\n" +
                                "                        <th>COMMENT</th></tr>";
                            console.log(data2);
                            $.each(data2,function () {
                                        $.each(this, function (index , value) {
                                    if(index =='author'){
                                        x =  value;
                                        txt1 += "<tr><td>" + x + "</td>";
                                    }
                                    if(index == 'comment'){
                                        y = value;
                                        txt1 += "<td>" + y + "</td></tr>";
                                    }
                                })
                            })
                            txt += txt1;
                            txt += "</table>"
                          //  $('#'+id).html(txt);
                            // tim cach thay gia tri
                        },
                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                $('#' + key).parent().addClass('error');
                            });
                        }
                    });
                   // $('#com').toggle("fold",300);
                  $( '#'+id).toggle( "fold", 700 );
                });
                $('.comment').submit(function (event)// save comments
                {
                    event.preventDefault();
                    var params = $(this).data();
                    var bComment = $('#input'+params.id).val();// chuyen qua id *********************************
                    if(bComment){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax(
                            {
                                method: "POST",
                                url: "comments1/" + params.id,
                                data: { comment: bComment },
                                success: function (data)
                                {
                                    console.log(params.id);
                                    console.log(bComment);
                                    console.log(data);
                                    $('#blogCommentCount'+params.id).text(data.comment_count);// hien thi comment count
                                    $('#show'+params.id).text('you have just posted comment "'+bComment+'" on blog '+params.id );
                                    if(!bComment){
                                        console.log('wrong');
                                        console.log($('#input'+params.id));
                                    }
                                },
                                error: function (data)
                                {
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors, function (key, value)
                                    {
                                        $('#' + key).parent().addClass('error');
                                    });
                                }
                            })
                            .done(function( msg )
                            {
                                $(this).find("input").val("");
                                $(".comment").trigger("reset");
                            });
                    }

                });
            })
        </script>
        <script>
            document.cookie = "pageurl=" + encodeURIComponent(window.location['search']);
        </script>
        <script>
           //var token = '{{Session::token() }}';
           // var urlLike = '{{ route('like') }}';
         //var id = event.target.parentNode.parentNode.parentNode.dataset['postid'];
           //var _that = event.target.valueOf();
            $('.like10').click(function (event) {
                var _this = $(this);
                var params = _this.data();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/toggle/" + params.id,
                    data: {},
                    success: function (data) {
                        _this.prev().text(data.like);//hien thi like
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            $('#' + key).parent().addClass('error');
                        });
                    }
                });
            });
        </script>
        </div>
    </body>
</html>