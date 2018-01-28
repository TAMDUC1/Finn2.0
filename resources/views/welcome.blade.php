<!doctype html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelTemplate</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel ="stylesheet">
    </head>
    <body>
        <nav class = "clearfix" style="background-color: #cac8c6">
            @if (!session('email'))
                <a href = "signUp" class="float-right">SignUp</a>
                <a href="login" class="float-right">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{action('UserController@logout')}}">
                    {{ csrf_field() }}
                    <button type = "submit" class = "btn btn-danger float-right" >Log out</button>
                </form>
            @endif
                <a href="blogs" class="float-right">Blogs</a>
            @if(session('role'))
                <a href="{{route('profile1')}}" class="float-right">Profile</a>
            @endif
            @if(!session('role'))
                <a href="{{route('profile')}}" class="float-right">Profile</a>
            @endif
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current = "page">
                    Home
                </li>
            </ol>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class = "content">
                <div class = "title m-b-md">
                    Finn 2.0
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </body>
</html>
