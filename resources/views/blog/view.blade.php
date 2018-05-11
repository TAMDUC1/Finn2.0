<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery.columns.min.js')}}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="ha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <div class="main">
            <div>
                <div class="card" style="">
                    <div class="card-header" id="titleBlog">
                        Title:  {{$blog->title}}
                    </div>
                    <div class="blog-comment card-body" >
                        <div>
                            Blog-id:  {{$blog->id}}
                        </div>
                        <div id="contentBlog">
                            Content: {{$blog->content}}
                        </div>
                        <div>
                            {{$blog->author}}
                        </div>
                        <div>
                            Created at: {{$blog->created_at}}
                        </div>
                        <div>
                            {{$blog->author_id}}
                        </div>
                        <div>
                            Total like: {{$blog->emotions()->count()}}
                        </div>
                        <div>
                            Total comments :  {{$blog->comments()->count()}} Comment
                        </div>
                        @if($blog->user_id === session('user_id')||(session('role')))
                            <div>
                                <form  action="{{action('BlogController@update', $id=$blog->id)}}" id="blogEdit" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH')}}
                                    <input name="_method" value="PATCH" type="hidden">
                                    <div>
                                        <input type="text" class="form-control" name="title" id="title" style="border-color: #5bc0de;border-radius: 5px" placeholder="Edit Title php"/>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="content" id="content" style="border-color: #5bc0de;border-radius: 5px" placeholder="Edit Content php"/>
                                    </div>
                                    <button class="btn btn-primary" type="submit" form="blogEdit" style="border-radius: 5px">Submit
                                    </button>
                                </form>
                            </div>
                            <div style="padding-top: 5px" >
                                <div>
                                    <form class="editTitleBlog" type="hidden" method="POST"  data-id="{{$blog->id}}">
                                        <input type="text" placeholder="Edit title Jquery" id="inputEditTitle{{$blog->id}}"style="border-color: #5bc0de;border-radius: 5px">
                                    </form>
                                </div>
                                <div>
                                    <form class="editContentBlog" type="hidden" method="POST" id="" data-id="{{$blog->id}}">
                                        <input class="editContent" type="text" placeholder="Edit Content Jquery" id="inputEditContent{{$blog->id}}" style="border-color: #5bc0de;border-radius: 5px">
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <div class="card" style="width: 600px">
                    <div class = "card-header">
                        <strong><h5>Comments of this blog</h5> </strong>
                    </div>
                    <table class="table table-responsive table table-hover data-table ">
                        <thead>
                        <tr  >
                            <th>Comment</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        @foreach($comment as $c)
                            <tr id="comment{{$c->id}}">
                                <td >
                                    <div id="comment1{{$c->id}}">
                                        <div id="comment2{{$c->id}}" data-id="{{$c->id}}" style="visibility: visible">
                                            {{$c->comment}}
                                        </div>
                                        <form class="editForm" id="editForm{{$c->id}}" method="POST" data-id="{{$c->id}}">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH')}}
                                            <input name="_method" value="PATCH" type="hidden">
                                            <input type="text" id="input{{$c->id}}" style="visibility: hidden" placeholder="{{$c->comment}}">
                                        </form>
                                        <button class= "btn-primary cancel" id="cancel{{$c->id}}" style="border-radius: 5px;visibility: hidden" data-id="{{$c->id}}">cancel</button>
                                    </div>
                                </td>
                                <td>
                                    @if((session('role')))
                                        <form action="{{action('CommentController@destroy', $id = $c->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger pull-right" type="submit" style="margin:1px;width: 168px ">Delete via PHP</button>
                                        </form>
                                        <button class="btn btn-primary delete"  name="_method" id="{{$c->id}}" data-id="{{$c->id}}" data-token="{{ csrf_token() }}" > Delete via javascript</button>
                                    @endif
                                </td>
                                @if($c->author_id === session('user_id'))
                                    <td>
                                        <button class="btn btn-primary edit" id="edit{{$c->id}}" data-id="{{$c->id}}" style="visibility: visible">Edit via javascript</button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        {{$comment->links()}}

                    </table>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('.comment').submit(function (event)// save comments
            {
                event.preventDefault();
                var _this = $(this);
                var params = _this.data();
                var comment = _this.val();
                var bComment = $('#'+params.id).val();// chuyen qua id *********************************
                console.log(bComment);
                console.log(params.id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                    {
                        method: "POST",
                        url: params.id+"/comments1",
                        data: { comment: bComment },
                        success: function (data)
                        {
                            $('#blogCommentCount'+params.id).text(data.comment_count);// hien thi comment count
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
            });
            $('.delete').click(function(e){
                event.preventDefault();
                var _this = $(this);
                var params = _this.data();
                var token = $(this).data('token');

                console.log(params.id);
                console.log(token);
                $.ajax( {
                    type : 'post',
                    url  : "/comments/"+params.id,
                    data : {_method: 'delete', _token :token}
                } )
                $( "#comment"+params.id ).remove();
            });
            $('.edit').click(function(e){
              //  event.preventDefault();
                var _this = $(this);
                var params = _this.data();
                $('#edit'+params.id).css({"visibility":"hidden"});
                $('#input'+params.id).css({"visibility":"visible"});
                $('#cancel'+params.id).css({"visibility":"visible"});
                $('#comment2'+params.id).css({"visibility":"hidden"});
            });

            $('.cancel').click(function (e) {
                var _this = $(this);
                var params = _this.data();
                $('#comment2'+params.id).css({"visibility":"visible"});
                $('#cancel'+params.id).css({"visibility":"hidden"});
                $('#input'+params.id).css({"visibility":"hidden"});
                $('#edit'+params.id).css({"visibility":"visible"});
            });
            $('.editForm').submit(function (event)// save comments
            {
                event.preventDefault();
                var params = $(this).data();
                var bComment = $('#input'+params.id).val();// chuyen qua id *********************************
                if(bComment)
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax(
                        {
                            method: "GET",
                            url: "/comments/" + params.id +"/edit",
                            data: { comment: bComment },
                            success: function (data)
                            {
                                if(!bComment){
                                    console.log('wrong');
                                  //  console.log($('#input'+params.id));
                                }
                                $('#comment2'+params.id).css({"visibility":"visible"}).text(bComment);
                                $('#cancel'+params.id).css({"visibility":"hidden"});
                                $('#input'+params.id).css({"visibility":"hidden"});
                                $('#edit'+params.id).css({"visibility":"visible"});

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
            $('.editTitleBlog').submit(function(){
                event.preventDefault();
                var params = $(this).data();
                var title1 = $('#inputEditTitle'+params.id).val();// chuyen qua id *********************************
                console.log(params.id);
                console.log(title1);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                    {
                        method: "POST",
                        url: "/blogs/" + params.id +"/editTitleBlog",
                        data: { title: title1 },
                        success: function (data){
                            console.log('done');
                            $('#titleBlog').text('new title :'+ title1);

                        },
                        error: function (data)
                        {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value)
                            {
                                $('#' + key).parent().addClass('error');
                            });
                        }
                    }

                )
            })
            $('.editContentBlog').submit(function(){
                event.preventDefault();
                var params = $(this).data();
                var content1 = $('#inputEditContent'+params.id).val();// chuyen qua id *********************************
                console.log(params.id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                    {
                        method: "POST",
                        url: "/blogs/" + params.id +"/editContentBlog",
                        data: { content: content1 },
                        success: function (data){
                            console.log('done');
                            $('#contentBlog').text('new content '+content1);
                        },
                        error: function (data)
                        {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value)
                            {
                                $('#' + key).parent().addClass('error');
                            });
                        }
                    }

                )
            })
        </script>
</body>
</html>
