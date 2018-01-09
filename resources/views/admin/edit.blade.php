<!-- edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LaravelTemplate</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar" style="background-color: #cac8c6" role="navigation">
    <div class="navbar navbar-dark" style="text-decoration: none">
    </div>
    <div>
            <span>
                  Profile
            </span>
        <a href="{{route('profile1')}}">Profile</a>
    </div>
</nav>
<div class="container">
    <h2>Change Pass</h2><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{action('AdminController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter your new email" name="email" value="{{$admin->email}}">
            </div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="form-group col-md-4">
                <label for="password">Password:</label>
                <input type="password" class="form-control" placeholder="Enter your new password" name="password" value="{{$admin->password}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-left:100px">Update</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>