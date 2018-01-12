<!doctype html>
<html lang="{{ app()->getLocale() }}
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
        <nav class="navbar" style="background-color: #8b8987" role="navigation">
            <div class="container" style="background-color: #0000F0">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <a href="/" class= "btn btn-warning">Home</a>
                    </div>
                    <div class="col-md-2">
                        <form method="post" action="{{action('UserController@logout')}}">
                            {{ csrf_field() }}
                            <div class="logout-button">
                                <label>
                                    <button type="submit" class="btn btn-danger" >Log out</button>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h5>{{session('email')}}</h5>
                <div>
                   <a href="{{action('UserController@edit',$id = session('user_id'))}}" class="btn btn-warning"> change Password</a>
                </div>
            </div>
        </div>
        <div class="footer">footer</div>
    </body>
</html>
