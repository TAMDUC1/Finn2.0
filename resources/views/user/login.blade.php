<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <title>LaravelTemplate</title>
    <script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar" style="background-color: #cac8c6" role="navigation">
    <div class="navbar navbar-dark" style="text-decoration: none">
    </div>
    <div>
        <a href="/">Home</a>
    </div>
</nav>
<div class="flex-center position-ref full-height">
    <div >
        <div >
            <form method="post" action="{{action('UserController@signin1')}}">
                {{csrf_field()}}
                <div>
                    <label for="email">Email</label>
                </div>
                <div>
                    <input type="text" class="form-control" name="email"id="searchEmail" autocomplete="on" style="border-color: #5bc0de;border-radius: 5px">
                </div>
                <div>
                    <label for="password">Password</label>
                </div>
                <div>
                    <input type="password" class="form-control" name="password"style="border-color: #5bc0de;border-radius: 5px">
                </div>
                <div>
                    <button type="submit" class="btn"style="margin-top: 5px">Login</button>
                </div>
            </form>
        </div>
        <div>
            <a href="{{route('redirectToProvider')}}" class="btn btn-danger" data-scope="email"style="width: 95px">Google</a>
        </div>
        <div>
            <a href="{{route('redirect')}}" class="btn btn-primary" data-scope="email" style="margin-top: 5px">Facebook</a>
        </div>
        {{-- javascript login
          <div>
                      <button onclick="login();">
                          Facebook login
                      </button>
                  </div>
                   <div>
                       <button onclick="logout();">
                           Facebook logout
                       </button>
                   </div>
         --}}
        <div class="signup">
            <a href="{{route('users.create')}}"style="text-decoration: none">Or sign up here</a>
        </div>
        <div class="signup">
            <a href="{{route('users.create')}}"style="text-decoration: none">Forget your password</a>
        </div>
    </div>
    <div></div>
</div>

<script type="text/javascript">

    // login by javascript----


    // window.fbAsyncInit = function() {
    FB.init({
        appId            : '891006804401694',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.11'
    });
    //};
    FB.getLoginStatus(function (response) {
        console.log('99999');
        if(response.status==='connected'){
            document.getElementById('java').innerHTML ='Ok you are connected to our Website via facebook acc';
        } else if(response.status==='not_authorized'){
            document.getElementById('java').innerHTML ='You are not connected via facebook';
        }else{
            document.getElementById('java').innerHTML ='You are not connected via facebook';
        }
    });
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function login() {
        FB.login(function (response) {
            if(response.status==='connected'){
                document.getElementById('java').innerHTML ='Ok you are connected to our Website via facebook acc';
            } else if(response.status==='not_authorized'){
                document.getElementById('java').innerHTML ='You are not connected via facebook';

            }else{
                document.getElementById('java').innerHTML ='You are not connected via facebook';
            }
        });
    }
    function logout() {
        FB.logout(function (response) {

        });

    }
    // end----



    console.log('1222');
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function ()
    {
        console.log('444');
        $('#searchEmail').keypress(function ()
        {
            console.log('1232222');
            $.ajax
            ({
                dataType: 'json',
                url:'searchName',// logic tren serve
                success:function(data)
                {
                    console.log('4444');
                    console.log(data.email);
                }
            })
        });
    })
</script>
<script>
</script>

</body>

</html>