<!doctype html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelTemplate</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="{{ asset('css/welcome.css')}}" rel ="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div id="fb-root"></div>
    <script>
        var name ='';
        var email = '';
        var id='';
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                testAPI();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/check",
                    data: {
                        name: name,
                        email: email,
                        facebookId: id
                    },
                    success: function(result){
                        console.log('done1');
                    }});
            }
            else {
                // The person is not logged into your app or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
                if(response.status ==='unknown')
                {
                    console.log('chua connect');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                      //  $.ajax({
                      //  method: "POST",
                      // url: "/logout",
                      //data: {},
                      // success: function(result){
                      // console.log('done2');
                    //}});
                }
            }
        }
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '{891006804401694}',
                cookie     : true,  // enable cookies to allow the server to access
                                    // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.8' // use graph api version 2.8
            });
            // Now that we've initialized the JavaScript SDK, we call
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        };
        // Load the SDK asynchronously
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=891006804401694&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        function testAPI()
        {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response)
            {
               name = response.name;
               id = response.id;
             // var email = response.email;
                console.log('Successful login for: ' + response.name);
                document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.name + '!';
            });
            FB.api('/me', {fields: 'name'}, function(response) {
                console.log(response);
            });
            FB.api('/me', {fields: 'email'}, function(response) {
                 email = response.email;
                console.log(response.email);
            });
        }
    </script>
    <nav class = "clearfix" style="background-color: #cac8c6"style="margin:1px ">
        <fb:login-button size="large" max_rows="1" auto_logout_link="true" scope="public_profile,email" onlogin="checkLoginState();" class="float-right">
        </fb:login-button>
        <div id="status1" >
        </div>
            @if (!session('email'))
                <a href = "signUp" class="float-right">SignUp</a>
                <a href="login" class="float-right">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{route('logout')}}">
                    {{ csrf_field() }}
                    <button type = "submit" class = "btn btn-danger float-right"style="margin:1px " >Log out</button>
                </form>
            <img class="img-responsive float-right"  src="{{session('avatar')}}" alt="profile Pic" style="border-radius: 5px; width: 38px" >
        @endif
                <a href="blogs" class="float-right">Blogs</a>
            @if(session('role'))
                <a href="{{route('profile1')}}" class="float-right">Profile</a>
            @endif
            @if(!session('role'))
                <a href="{{route('profile')}}" class="float-right">Profile</a>
            @endif
                <a class="float-right" href="about">Web</a>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current = "page">
                    Home
                </li>
            </ol>
        </nav>
        <div class="main">
            <div class="">
                <div class = "content">
                    <div class = "title m-b-md">
                        Finn 2.0
                    </div>
                </div>
            </div>
            <div class="intro" style="">
                <div id="name">
                    <h2>
                    </h2>
                </div>
                <div class="details" style="height: 500px">
                    <div class="details-left" >
                        <ul class="list-group" style="text-align: left">
                            <strong>Intro</strong>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam, consectetur ea expedita fuga illo labore omnis velit! Ab amet atque iure magni maiores nemo non nostrum sed tempora velit? Animi aspernatur autem et explicabo facere hic illum incidunt, itaque laborum, odit ratione unde velit voluptatum? Aliquam blanditiis eum placeat?
                            </li>
                        </ul>
                    </div>
                    <div class="details-container" >
                        <div class="details-container-left">
                            <div>
                                <ul>
                                    <h4>
                                        <strong>Experience</strong>
                                    </h4>
                                    <li>
                                        Software Developer
                                        <p>
                                            Web Freelancer Developer
                                        </p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi asperiores dicta dolore doloribus exercitationem facere fugiat harum, illo praesentium tempore.</p>
                                    </li>
                                    <li>IT support officer at NTNU
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate distinctio doloremque enim maiores minus molestiae molestias nam odit, officia quas quasi ullam voluptas!
                                        </p>
                                    </li>
                                    <li>
                                        <a href="http://humg.edu.vn/Pages/home.aspx">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.ntnu.no">
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <h4>
                                        <strong>Education</strong>
                                    </h4>
                                    <li>
                                        <div style="margin: 5px">
                                            <strong> ASP.Net MVC Certificate, Aptech</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="margin: 5px">
                                            <strong>NTNU</strong>
                                            <a href="https://www.ntnu.no">
                                            </a>
                                            <strong>Bachelor of Petroleum Geology, Norwegian University of Science and Technology</strong>
                                            <p>Have some IT Courses : Web Technology,Information Technology, Object oriented Programming,Communication Service and Internet, Datamodelling Database-system, Algorithm Datastructure </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="margin: 5px">
                                            <strong>Hanoi mining and geologi University</strong>
                                            <a href="http://humg.edu.vn/Pages/home.aspx">
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                    </li>
                                    <li>
                                    </li>
                                    <li>
                                    </li>
                                </ul>
                                <ul >
                                    <h4>
                                        <strong>Languages</strong>
                                    </h4>
                                    <li>
                                        English
                                    </li>
                                    <li>
                                        Norsk
                                    </li>
                                    <li>
                                        Vietnamese
                                    </li>
                                </ul>
                            </div>
                            <div id="live">
                            </div>
                        </div>
                        <div class="details-container-right"style="margin-right: 12px; background-color: #5bc0de">
                            <ul style="margin-top: 10px">
                                <li><h4>Personal Info</h4></li>
                                <li>
                                   <span><strong>Tam Duc Pham</strong><img class="img-responsive" src="{{URL::asset('/images/profile.jpg')}}" alt="profile Pic" width="50" style="border-radius: 10px;margin-left: 20px" ></span>
                                </li>
                                <li>
                                    Web Developer
                                </li>
                                <li>
                                    mobile: 0934465283
                                </li>
                                <li>
                                    Email:phamductam2004@gmail.com
                                </li>
                                <li>
                                    LinkedIn:
                                </li>
                                <li>
                                  <p>   Address: 53 Martin Kregnes vei, 7091 Tiller , Norway
                                  </p>
                                </li>
                            </ul>
                            <ul style="margin-top: 10px">
                                <li><div><h4>Skill</h4></div></li>
                                <li>
                                    Project Scheduling
                                </li>
                                <li>Sale Analysis
                                </li>
                                <li>Strategi Planning
                                </li>
                                <li>Communication Skills
                                </li>
                                <li>Business Process Improvement
                                </li>
                            </ul>
                            <ul style="margin-top: 10px">
                                <li><div><h4>Software</h4></div></li>
                                <li>
                                   PHP,C#,Javascrip
                                </li>
                                <li>Linux/Unix
                                </li>Apache
                                <li>Laravel
                                </li>
                                <li>Mysql
                                </li>
                                <li>git
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
        <script>
            $(document).ready(function () {
                $('.work').click(function(e)
                {
                    e.preventDefault();
                    $('#studie').replaceWith("<div id='studie'>"+
                            "<ul>"+
                                "<li>"+ "<a href='http://humg.edu.vn/Pages/home.aspx'>"+ "Hanoi mining and geology "+"</a>" +"</li>"
                              +  "<li>"+ "<a href='https:ntnu.no'>"+ "NTNU"  +"</a>" +"</li>"
                            +"</ul>" +"</div>");
                })
            })
            $(document).ready(function ()
            {
                $('.live').click(function(e)
                {
                    e.preventDefault();
                    $('#live').replaceWith("<div id='#live'>" + "Hanoi and Norway "+"</div>");
                })
            })
        </script>
    </body>
</html>
