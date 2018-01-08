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
    <script type="text/javascript">
        $(document).ready(function () {
            alert($.session.get("email"));
            var elem = $('#admin');
            if($.session.get('email'==='tamduc@stud.ntnu.no')){
                elem.style.visibility = 'visible';
            }
            else{
                elem.style.visibility = 'hidden';
            }
        })
    </script>
</head>
<body>
<nav class="navbar" style="background-color: #cac8c6" role="navigation">
    <div class="navbar navbar-dark" style="text-decoration: none">
    </div>
    <div>
        <div id="admin">
              <span>
                    <a href="signUp1"class="btn btn-primary">Create a new admin</a>
        </span>
            <span>
                    <a href="{{route('admins.index')}}" class=" btn btn-warning">Admin list</a>
        </span>
        </div>

        <span>
                    <a href="{{route('users.index')}}" class=" btn btn-warning">User list</a>
        </span>

    </div>
    <div>
        <form method="post" action="{{action('UserController@logout')}}">
            {{ csrf_field() }}
            <div class="logout-button">
                <label>
                    <button type="submit" class="btn btn-danger" >Log out</button>
                </label>
            </div>
        </form>
    </div>
</nav>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Admin
        </div>
        <h4>{{session('email')}}</h4>

    </div>
</div>
<div class="footer">footer</div>
</body>
</html>
