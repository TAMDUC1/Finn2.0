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
        <a href="/">
            Home
        </a>
    </div>
</nav>
<div class="container">
    <h2>Change Blog</h2><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{action('BlogController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <div>
                        <div>
                            <label for="title"style = "color: #1c679c">Title</label>
                        </div>
                        <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="title"
                                style="border-color: #1c679c">
                        </input>
                    </div>
                    <div>
                        <label for="content"style = "color: #1c679c">Content</label>
                    </div>
                    <div>
                        <input
                                type="text"
                                class="form-control"
                                name="content"
                                id="content"
                                style="height:200px;font-size:14pt;border-color: #1c679c">
                        </input>
                    </div>
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