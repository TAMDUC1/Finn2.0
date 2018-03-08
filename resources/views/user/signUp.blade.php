<!-- create.blade.php.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

        <title>Finn </title>
    </head>
    <body>
        <nav class="clearfix"style="background-color: #cac8c6">
            <a class="btn float-right" href="{{route('login')}}"style="margin:1px ">Login</a>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">
                    SignUp
                </li>
            </ol>
        </nav>
        <div class="flex-center position-ref full-height">
            <div>
                <form method="post" action="{{url('users')}}" id="register" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{csrf_field()}}
                    <div>
                        <div style="border-color: #5bc0de">
                            <label for="name">Name:</label>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="name" id="name" style="border-color: #5bc0de;border-radius: 5px"/>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="email">Email</label>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="email" id="email" style="border-color: #5bc0de;border-radius: 5px"/>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="password">Password</label>
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" id="password" style="border-color: #5bc0de;border-radius: 5px"/>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning"  value="Resgister"style="margin-top: 5px;margin-left: 52px">Submit</button>
                    </div>
                </form>
        </div>
            <div>
                <div class="fail">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                        <br />
                    @endif
                </div>
            </div>
        </div>
        <div class=" footer"style="background-color: #efefef">
        </div>
    </body>
</html>


