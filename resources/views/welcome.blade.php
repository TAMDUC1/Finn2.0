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
    </head>
    <body>
        <nav class="navbar" style="background-color: #cac8c6" role="navigation">
            <div>
                @if (!session('email'))
                    <div class="alert alert-success">
                        <a href="signUp" class="btn btn-warning">SignUp</a>
                        <a href="login" class="btn btn-warning">Login</a>
                    </div>
                @endif
                @if (session('email'))
                        <form method="post" action="{{action('UserController@logout')}}">
                            {{ csrf_field() }}
                            <div class="logout-button">
                                <label>
                                    <button type="submit" class="btn btn-danger" >Log out</button>
                                </label>
                            </div>
                        </form>
                @endif
            <div class="navbar navbar-dark" style="text-decoration: none">
            </div>
            </div>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
            </div>
        </div>
        <div class="footer">footer</div>
    </body>
</html>
