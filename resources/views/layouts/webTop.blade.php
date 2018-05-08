<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{!! asset('js/dropdown.js') !!}"></script>
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinysort/2.3.6/tinysort.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinysort/2.3.6/tinysort.charorder.min.js"></script>
</head>
<body>
<script>
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
            testAPI();

        } else {
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
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
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }
</script>
<div class="super-main">
    <div class="pre-header" id="header">
        <div class="additional-shop-info" style="height: 40px">
            <div style="padding: 3px">
                <i class="fa fa-phone">
                </i>
                <span>
                        +1 456 6717
                </span>
            </div>
            <div style="padding: 3px;">
                <li class="shop" style="list-style: none">
                    <a href="javascript:void(0);" style="padding: 3px">€</a>
                    <a href="javascript:void(0);" style="padding: 3px">£</a>
                    <a href="javascript:void(0);" class="current" style="padding: 3px">$</a>
                </li>
            </div>
            <div style="padding: 3px">
                <a href="javascript:void(0);" class="current">English </a>
                <div class="langs-block-others-wrapper">
                    <div class="langs-block-others">
                        <a href="javascript:void(0);">French</a>
                        <a href="javascript:void(0);">Germany</a>
                        <a href="javascript:void(0);">Turkish</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="additonal-nav" style="height: 40px">
            <div class=" additonal-nav-grid" id="additonal-nav-grid1" style="justify-self: end; padding-right: 7px">
                @if(session('role'))
                    <a href="{{route('profile1')}}" style="margin-left: 20px">My Account</a>
                @endif
                @if(!session('role'))
                    <a href="{{route('profile')}}" style="margin-left: 20px">My Account</a>
                @endif
            </div>
            <div class=" additonal-nav-grid"id="additonal-nav-grid3"style="justify-self: start;padding-left: 7px">
                <a href="checkout">Checkout</a>
            </div>

            @if(!session('email'))
                <div class=" additonal-nav-grid"id="additonal-nav-grid4"style="justify-self: start;padding-left: 7px">
                    <a href="login">Log in</a>
                </div>
            @endif
            <div class=" additonal-nav-grid"id="additonal-nav-grid5"style="justify-self: start;padding-left: 7px">
                <a href="{{route('about')}}">About</a>
            </div>
            @if(session('avatar'))
                <div class=" additonal-nav-grid" >
                    <img class="img-responsive" style="width:30px;border-radius: 2px " src="{{Session::get('avatar')}}" alt="">
                </div>
            @endif
        </div>
    </div>
    <div class="header" style="padding-left: 10px">
        <div class="header-navigation-left">
            <a class="site-logo" href="{{route('main')}}">
                <img class="img-responsive"  src="../images/logos/logo-shop-red.png" alt="Metronic Shop UI">
            </a>
        </div>
        <div class="header-navigation-mid">
            <div class="header-navigation-mid-title dropdown">
                <li class="list-unstyled dropdown">
                    <a  data-target="#" href="{{route('products.index')}}"aria-haspopup="true" aria-expanded="false">PTS</a>
                    <ul class="dropdown-menu">
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                    </ul>
                </li>
            </div>
            <div class="header-navigation-mid-title dropdown dropdown-megamenu" >
                <a data-target="#" href="products"  aria-haspopup="true" aria-expanded="false">MAN</a>
                <ul class="dropdown-menu">
                    <li >
                        <div  class="mega-menu">
                            <div style="padding-left: 20px">
                                FOOTWEAR
                                <ul style="margin: 0px">
                                    <li class="dropdown-item">
                                        <a href="listItems">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li >
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                CLOTHING
                                <ul style="margin: 0px">
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li >
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                ACCESSORIES
                                <ul style="margin: 0px">
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li >
                                </ul>
                                CLEARANCE
                                <ul style="margin: 0px">
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="">Astro Trainers</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="drop-man-footer" style="padding: 5px">
                                <div style="width: 100x;height: 100px">
                                    <img src="../images/brands/canon.jpg" alt="" style="width: 100px">
                                </div>
                                <div>
                                    <img src="../images/brands/esprit.jpg" alt=""style="width: 100px">
                                </div>
                                <div>
                                    <img src="../images/brands/zara.jpg" alt=""style="width: 100px">
                                </div>
                                <div>
                                    <img src="../images/brands/puma.jpg" alt=""style="width: 100px">
                                </div>
                                <div>
                                    <img src="../images/brands/esprit.jpg" alt=""style="width: 100px">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-navigation-mid-title">
            </div>
            <div class="dropdown header-navigation-mid-title">
                <a href="products">NEW</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <div class="new-dropdown" style="    border-top:2px solid #EA4C1D;" >

                        <div>
                            <img class="img-responsive" src="../images/products/model4.jpg" alt="Berry lace dress" width="100%">
                            <h3>
                                <a href="">Berry lace dress</a>
                            </h3>
                            <div class="pi-price" style="float: left; display: grid;width: 100%;grid-template-columns: 1fr 1fr">
                                <a href="" class="btn btn-default" style="color: red">
                                    $29.00
                                </a>
                                <a href="javascript:;" class="btn btn-default" style="right: 0px">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <img class="img-responsive" src="../images/products/model1.jpg" alt="Berry lace dress" width="100%">
                            <h3>
                                <a href="">Berry lace dress</a>
                            </h3>
                            <div class="pi-price" style="float: left; display: grid;width: 100%;grid-template-columns: 1fr 1fr">
                                <a href="" class="btn btn-default"style="color: red">
                                    $29.00
                                </a>
                                <a href="javascript:;" class="btn btn-default" style="right: 0px">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <img class="img-responsive" src="../images/products/model1.jpg" alt="Berry lace dress" width="100%">
                            <h3>
                                <a href="">Berry lace dress</a>
                            </h3>
                            <div class="pi-price" style="float: left; display: grid;width: 100%;grid-template-columns: 1fr 1fr">
                                <a href="" class="btn btn-default"style="color: red">
                                    $29.00
                                </a>
                                <a href="javascript:;" class="btn btn-default" style="right: 0px">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <img class="img-responsive" src="../images/products/model4.jpg" alt="Berry lace dress" width="100%">
                            <h3>
                                <a href="">Berry lace dress</a>
                            </h3>
                            <div class="pi-price" style="float: left; display: grid;width: 100%;grid-template-columns: 1fr 1fr">
                                <a href="" class="btn btn-default"style="color: red">
                                    $29.00
                                </a>
                                <a href="javascript:;" class="btn btn-default" style="right: 0px">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="header-navigation-mid-title dropdown">
                <li class="list-unstyled dropdown">
                    <a href="">PAGES</a>
                    <ul class="dropdown-menu">
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                        <li class=" dropdown-item">
                            Hi Tops
                        </li>
                        <li class="dropdown-item">
                            Running shoes
                        </li>
                        <li class="dropdown-item">
                            Jackets and Coats
                        </li>
                    </ul>
                </li>
            </div>
            <div class="header-navigation-mid-title" style="border-style: solid; border-width: thin; border-left-color: transparent;border-top-color: transparent;border-bottom-color: transparent; padding-right: 5px ">
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes&amp;utm_source=download&amp;utm_medium=banner&amp;utm_campaign=metronic_frontend_freebie" target="_blank">ADMIN THEMES</a>
            </div>
            <div id="search" >
                <i class="fa fa-search"></i>
            </div>
        </div>
        <div class="header-navigation-right">
            <div class="top-cart-info">
                <div class="mini" >
                    <a href="" style=" border-width: thin;padding-right: 2px; text-align: center">Total</a>
                    <a href="" style="text-align: left"><span>$</span>{{Session::get('cartTotalPrice')}}</a>
                </div>
                <a href="{{action('CartController@showCartItems', $id = Session::get('user_id'))}}">
                    <i id="cart" class="fa fa-shopping-cart" style=" float:right; background-color: red;font-size:18px;color: white; border-radius: 10%;padding: 9px;margin: 5px"></i>
                </a>
            </div>
            <div class="a.mobi">
                <i class="fa fa-bars" id="fa" style="display: none"></i>
            </div>
        </div>
    </div>
</div>
</body>
@yield('web')

