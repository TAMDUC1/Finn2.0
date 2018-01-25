<!doctype html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar" style="background-color: #cac8c6" role="navigation">
            <div class="navbar navbar-dark" style="text-decoration: none">
            </div>
            <div>
                <span>
                      Profile
                </span>
                <a href="/">Home</a>
            </div>
        </nav>
        <div>
            Change Pass
            <h5>User {{session('user_id')}}</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{action('UserController@update',$id = session('user_id'))}}">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your new password" name ="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-warning" style="margin-left:30%;">Change Pass</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="footer"></div>
    </body>
</html>
