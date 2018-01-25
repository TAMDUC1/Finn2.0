<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="ha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="flex-center position-ref full-height ">
        <div class="blog-comment">
            <div>
                {{$blog->id}}
            </div>
            <div>
                {{$blog->title}}
            </div>
            <div>
                {{$blog->content}}
            </div>
            <div>
                {{$blog->author}}
            </div>
            <div>
                {{$blog->created_at}}
            </div>
            <div>
                {{$blog->author_id}}
            </div>
        </div>
        <div>
            <table class="table table-responsive table-striped table table-hover data-table">
                <tr>
                    <th>
                       {{$blog->commentsCount->first()->aggregate}} Comment
                    </th>
                </tr>
                @foreach($comment as $c)
                    <tr>
                        <td>
                            {{$c->comment}}
                        </td>
                    </tr>
                @endforeach
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
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
