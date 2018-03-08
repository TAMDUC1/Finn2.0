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


        <link href="{{ asset('css/welcome.css') }}" rel ="stylesheet">
    </head>
    <body>
        <nav class = "clearfix" style="background-color: #cac8c6"style="margin:1px ">
            @if (!session('email'))
                <a href = "signUp" class="float-right">SignUp</a>
                <a href="login" class="float-right">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{action('UserController@logout')}}">
                    {{ csrf_field() }}
                    <button type = "submit" class = "btn btn-danger float-right"style="margin:1px " >Log out</button>
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
        <div class="main">
            <div class="">
                <div class = "content">
                    <div class = "title m-b-md">
                        Finn 2.0
                    </div>
                </div>
            </div>
            <div class="intro">
                <div id="name" style="background-color: #e0dedc">
                    <h2>
                        Tam Duc Pham
                    </h2>
                </div>
                <div class="details">
                    <div class="details-left" >
                        <ul class="list-group" style="text-align: left">
                            <li>
                                Overview

                            </li>
                            <li>
                                <a href="" class="work">Work and Education</a>
                            </li>
                            <li>
                                <a href="" class="live">Places i have lived</a>

                            </li>
                            <li>
                                <a href="">Detail about me</a>
                            </li>
                            <li>
                            </li>
                        </ul>
                    </div>
                    <div class="details-container" >
                        <div class="details-container-left">
                            <div id="adding">
                                <a href=""></a>
                            </div>
                            <div id="studie">

                                <ul>
                                    <li>
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
                            </div>
                            <div id="live">

                            </div>

                        </div>
                        <div class="details-container-right">
                            <ul>
                                <li>
                                    <img src="{{URL::asset('/images/profile.jpg')}}" alt="profile Pic" height="100" width="100" style="border-radius: 50px" >
                                </li>
                                <li>
                                    mobile: 0934465283
                                </li>
                                <li>
                                    Email:phamductam2004@gmail.com
                                </li>
                                <li>
                                    Hanoi
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer"></div>
        <script>
            console.log('wet');

            $(document).ready(function () {
                $('.work').click(function(e)
                {
                    e.preventDefault();
                  //¢  location.reload();
                    $('#studie').replaceWith("<div id='studie'>"+
                            "<ul>"+
                                "<li>"+ "<a href='http://humg.edu.vn/Pages/home.aspx'>"+ "Hanoi mining and geology "+"</a>" +"</li>"
                              +  "<li>"+ "<a href='https:ntnu.no'>"+ "NTNU"  +"</a>" +"</li>"
                            +"</ul>" +"</div>");

                })


            })
            $(document).ready(function () {
                $('.live').click(function(e)
                {
                    //location.reload();
                    e.preventDefault();
                   // $('#studie').hide();
                    $('#live').replaceWith("<div id='#live'>" + "Hanoi and Norway "+"</div>");
                   // $('.details-container-left').toggle();

                })

            })


        </script>
    </body>
</html>
