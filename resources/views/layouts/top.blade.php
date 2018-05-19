<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div >
            <nav class="clearfix" style="background-color: #8b8987" role="navigation">
                <form method="post" action="{{route('logout')}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger float-right" style="margin:1px ">Log out</button>
                </form>
                @if(session('avatar'))
                    <div class=" additonal-nav-grid" >
                        <img class="img-responsive float-right" style="width:38px;border-radius: 2px " src="{{Session::get('avatar')}}" alt="">
                    </div>
                @endif
            </nav>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('news')
    </body>
</html>


