<!doctype html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelTemplate</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6" role="navigation">
            <div>
                <form method="post" action="{{route('logout')}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger float-right"style="margin:1px " >Log out</button>
                </form>
            </div>
        </nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active"> <a href="{{route('profile1')}}">Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                User index
            </li>
        </ol>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Index
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Change Pass</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $U)
                    <tr id="user{{$U->id}}">
                        <td>{{$id=$U->id}}</td>
                        <td>{{$name=$U->name}}</td>
                        <td>{{$email=$U->email}}</td>
                        <td>
                            <a href="{{action('UserController@edit', $id=$U->id)}}" class="btn btn-warning">change pass PHP</a>
                        </td>
                        <td>
                            <form action="{{action('UserController@destroy', $id=$U->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete PHP</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-primary delete" id="edit{{$id}}" data-id="{{$id}}" data-token="{{ csrf_token() }}">
                                Delete Jquery
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    {{$user->links()}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">footer</div>
        <script type="text/javascript">
            $('.delete').click(function (event) {
                var _this = $(this);
                var params = _this.data();
                console.log(params.id);
                var token = $(this).data('token');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/users/" + params.id,
                    data: {_method: 'delete', _token :token},
                    success: function (data) {
                        console.log(params.id);
                        $( "#user"+params.id ).remove();

                        //  _this.prev().text(data.like);//hien thi like
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
    </body>
</html>
