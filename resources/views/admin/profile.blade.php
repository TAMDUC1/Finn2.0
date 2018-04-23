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
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6" role="navigation">
            <form method="post" action="{{route('logout')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger float-right" >Log out</button>
            </form>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Profile
                </li>
            </ol>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content">
                            <div class="title m-b-md" >
                                Admin
                            </div>
                            <h4>{{session('email')}}</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="admin">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if (session('email')==='tamduc@stud.ntnu.no')
                                            <div>
                                                <a href="signUp1"class="btn btn-warning" style="width: 180px">Create a new admin***</a>
                                                <a href="{{route('admins.index')}}" class=" btn btn-primary" style="width: 180px">Admin list</a>
                                                <a href="products/create"class="btn btn-warning" style="width: 180px">Create a new product***</a>
                                                <a href="ProductIndex" class=" btn btn-primary" style="width: 180px">Product list</a>

                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="blogs" class="btn btn-danger"style="width: 180px ">Blogs</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{route('users.index')}}" class=" btn btn-success" style="width: 180px">User list</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">footer</div>
    </body>
</html>
