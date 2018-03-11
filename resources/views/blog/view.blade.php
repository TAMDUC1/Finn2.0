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
</head>
<body>
    <div class="main">
        <div class="blog-comment">
            <div>
              Blog-id:  {{$blog->id}}
            </div>
            <div>
              Title:  {{$blog->title}}
            </div>
            <div>
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
                Total comments : {{$blog->commentsCount->first()->aggregate}} Comment
            </div>
        </div>
        <div>
            <table class="table table-responsive table-striped table table-hover data-table">
                @foreach($comment as $c)
                    <tr>
                        <td>
                            {{$c->comment}}
                        </td>
                    </tr>
                @endforeach
                {{$comment->links()}}
                <tr>
                    <td>
                        <form  action="{{action('CommentController@update', $id=$blog->id)}}" id="comment" method="POST">
                            {{csrf_field()}}
                            {{ method_field('PATCH')}}
                            <input name="_method" value="PATCH" type="hidden">
                            <div>
                                <input type="text" class="form-control" name="comment" id="comment" style="border-color: #5bc0de;border-radius: 5px"/>
                            </div>
                        </form>
                        <form  class="comment" id="comment" data-id="{{$blog->id}}" method="post" type="hidden">
                            {{csrf_field()}}
                            <input type="text"  name="comment" id="{{$blog->id}}" style=" border-color: #669fe0;border-radius: 5px;width: 100%"/>
                        </form>
                    </td>
                </tr>
            </table>
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
            var id = event.target.parentNode.parentNode.parentNode.dataset['postid'];
            var _that = event.target.valueOf();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    method: "POST",
                    url: "comments/" + params.id,
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
    </script>
</body>
</html>
