<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/dropdown.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/slider.js') !!}"></script>
    <link href="{{ asset('css/bootstrap.touchspin.min.css') }}" rel="stylesheet">
    <script src="{{asset('js/slider.js')}}"></script>
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.0.0/jquery.bootstrap-touchspin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
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
                <div class=" additonal-nav-grid"id="additonal-nav-grid2"style="justify-self: end;padding-right: 7px">
                    <a href="" style="display: inline-block">My Wishlist</a>
                </div>
                <div class=" additonal-nav-grid"id="additonal-nav-grid3"style="justify-self: start;padding-left: 7px">
                    <a href="checkout">Checkout</a>
                </div>
                @if(!session('email'))
                <div class=" additonal-nav-grid"id="additonal-nav-grid4"style="justify-self: start;padding-left: 7px">
                    <a href="login">Log in</a>
                </div>
                @endif
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
                    <img class="img-responsive" src="../images/logos/logo-shop-red.png" alt="Metronic Shop UI">
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
                    <a href="#">KIDS</a>

                </div>
                <div class="dropdown header-navigation-mid-title">
                    <a href="">NEW</a>
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
                        <a href="" style="border-style: solid;border-top-color: transparent;border-left-color: transparent;border-bottom: transparent; border-width: thin;padding-right: 2px; text-align: center">Totals</a>
                        <a href="" style="text-align: left">{{Session::get('cartTotalPrice')}}</a>
                    </div>
                    <a href="{{action('CartController@showCartItems', $id = Session::get('user_id'))}}">
                        <i id="cart" class="fa fa-shopping-cart" style=" float:right; background-color: red;font-size:18px;color: white; border-radius: 60%;padding: 9px;margin: 5px"></i>
                    </a>
                </div>
                <div class="a.mobi">
                    <i class="fa fa-bars" id="fa" style="display: none"></i>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-sidebar" >
                <div class="main-sidebar-content" style="background-color: #f9f7f5">
                    <div aria-label="breadcrumb" style="background-color: #f9f7f5">
                        <ol class="breadcrumb" style="background-color: #e0dedc;">
                            <li class="breadcrumb-item">
                                <a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">Store</a>
                            </li >
                            <li class="breadcrumb-item">
                                <a href="">Term and condition</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div>
                    <ul class="sidebar-list" style="padding-left: 5px">
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href="login" style="margin-left: 20px">LOGIN/REGISTER</a>
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href="{{ route('password.request') }}"style="margin-left: 20px">RESTORE PASSWORD</a>
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            @if(session('role'))
                                <a href="{{route('profile1')}}" style="margin-left: 20px">MY ACCOUNT</a>
                            @endif
                            @if(!session('role'))
                                <a href="{{route('profile')}}" style="margin-left: 20px">MY ACCOUNT</a>
                            @endif
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href=""style="margin-left: 20px">ADDRESS BOOK</a>
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href="wishLists"style="margin-left: 20px">WISH LIST</a>
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href=""style="margin-left: 20px">RETURNS</a>
                        </li>
                        <li STYLE="background-color: white">
                            <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                            </i>
                            <a href=""style="margin-left: 20px">NEWSLETTER</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div style="margin-top: 54px">
                    <p>ABOUT US</p>
                    <div style="width: 95%;height: auto;background-color: white;padding: 20px" >
                        <img class="img-fluid" src="../images/img1.jpg" alt="">
                        <div >
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores distinctio doloribus libero nihil nulla quam quis tenetur totam voluptates. Amet inventore iste iusto nam odio officia quos rem temporibus voluptas voluptate! Alias aliquid error facere quod reiciendis rerum unde voluptatem!
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias aliquid animi atque, aut consequatur delectus dicta distinctio eligendi, et eveniet fugit impedit in incidunt laboriosam laborum maxime molestiae natus nostrum numquam officiis perferendis quas repudiandae sint totam ullam vel velit veniam voluptas, voluptate! Adipisci aspernatur delectus, distinctio dolorum eligendi hic ipsum libero quae qui velit. Accusamus adipisci aliquam animi assumenda at atque beatae delectus deserunt dolores et excepturi fugit laboriosam laborum modi mollitia nemo nobis nulla obcaecati porro quaerat quasi quibusdam quos repellendus, repudiandae soluta vel velit vero? Blanditiis consequatur exercitationem ipsam possimus, quibusdam sunt suscipit? Amet architecto consequatur delectus dicta eaque eveniet, exercitationem facere fugit ipsam, maiores nam neque non quas quia rerum saepe sapiente voluptas? Enim pariatur possimus repellendus! Animi assumenda cumque dolorem doloremque ea eos esse et facere facilis harum iure laboriosam natus necessitatibus numquam, pariatur perspiciatis placeat quo rem, repudiandae suscipit tempora vel vero vitae voluptate voluptates. Aliquid amet delectus dignissimos earum eius eos esse est, explicabo fugiat labore laudantium magnam magni odio quo sapiente sed sequi suscipit ut. Deleniti ea earum facilis fuga ipsam quam, rem veritatis? Animi architecto, aspernatur cupiditate dolorum enim iure maiores molestiae neque obcaecati rem sit velit! Asperiores at consequatur cumque quibusdam vel? Alias animi atque deserunt dignissimos dolore ea eius enim fugiat illum inventore iusto libero magni minus necessitatibus, obcaecati odit omnis, praesentium repellendus rerum sit ullam voluptas voluptates. Architecto, aut autem consequuntur cumque eos facilis fuga inventore laborum, laudantium maxime necessitatibus numquam obcaecati odit, reiciendis vitae. Accusamus, aliquid aperiam consequuntur corporis culpa delectus enim esse eum ex expedita explicabo id incidunt inventore laborum magnam maiores molestias nam nobis non numquam obcaecati odit officiis perferendis, perspiciatis possimus quas quo quos recusandae reprehenderit rerum sequi, soluta sunt velit vero vitae voluptas voluptatum! Consequatur, provident, quae? Delectus id maiores neque numquam?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam amet cum cupiditate doloribus ducimus enim eos error est et facilis fuga iusto, labore magni neque nulla perspiciatis provident, quam quis quod quos ratione rem, sint suscipit vel? Alias consequatur eveniet harum in itaque nam porro quas quis tempora tempore. Ab aliquam aliquid dicta dolor ducimus esse excepturi facere fuga fugiat fugit labore laudantium minus molestias non obcaecati, provident quae quasi quibusdam quidem sequi soluta vel vero voluptatibus? Aspernatur cumque dolores earum in, ipsum iusto neque nesciunt pariatur possimus ut! Accusantium ad aliquam atque commodi corporis culpa, debitis deleniti deserunt doloribus dolorum ducimus eius eos est et eum excepturi expedita fugiat harum id neque nesciunt nisi optio quasi quibusdam quo reiciendis, repudiandae rerum saepe sint sit sunt, totam vitae voluptatibus. A accusamus amet consectetur consequuntur cumque, debitis deleniti doloribus error, et excepturi iste itaque, libero maiores nostrum quisquam quod soluta sunt totam? Autem dignissimos earum inventore ipsa nostrum nulla quia recusandae, repellendus sequi temporibus. Architecto eligendi facere, fuga fugiat inventore, iure iusto magnam maxime nisi nobis obcaecati placeat quae ratione ullam voluptates? Atque autem cumque et exercitationem, itaque iusto, libero maxime minima obcaecati placeat porro possimus, recusandae reprehenderit ullam ut!
                        </p>
                    </div>
                </div>
            </div>
            <div class="main-footer">
                <div class="icon-bar">
                        <img class="img-fluid"   src="../images/brands/canon.jpg" alt="">
                </div>
                <div class="icon-bar">
                        <img class="img-fluid"  src="../images/brands/esprit.jpg" alt="">
                </div>
                <div class="icon-bar">
                        <img class="img-fluid"  src="../images/brands/gap.jpg" alt="">
                </div>
                <div class="icon-bar" >
                        <img class="img-fluid"  src="../images/brands/next.jpg" alt="">
                </div>
                <div class="icon-bar">
                        <img class="img-fluid"  src="../images/brands/puma.jpg" alt="">
                </div>
                <div class="icon-bar" >
                        <img class="img-fluid" src="../images/brands/zara.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="linhtinh">
            <div class="linhtinh-header">
                <div style="padding-top: 10px;">
                    <div class="linhtinh-header-grid" >
                        <div style="justify-self: end; padding-top: 10px">
                            <i class="fa fa-truck" style="font-size:30px;color:white ;border:thin; border-style: solid; border-radius: 30px ;padding: 6px; margin: 3px" >
                            </i>
                        </div>
                        <div>
                            <h1 style="color: white">
                                FREE SHIPPING
                            </h1>
                            <em style="color: ghostwhite">
                                Express delivery withing 3 days
                            </em>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding-top: 10px;">
                        <div class="linhtinh-header-grid">
                            <div style="justify-self: end; padding-top: 10px">
                                <i class="fa fa-gift" style="font-size:30px;color:white ;border:thin; border-style: solid; border-radius: 30px ;padding: 6px; margin: 3px" >
                                </i>
                            </div>
                            <div>
                                <h1 style="color: white">DAILY GIFTS
                                </h1>
                                <em style="color: ghostwhite">
                                    3 GIFTS DAILY GIFTS FOR LUCILY CUSTOMERS
                                </em>
                            </div>

                        </div>
                    </div>
                </div>
               <div>
                   <div style="padding-top: 10px;">
                       <div class="linhtinh-header-grid">
                           <div style="justify-self: end; padding-top: 10px">
                               <i class="fa fa-phone" style="font-size:30px;color:white ;border:thin; border-style: solid; border-radius: 30px ;padding: 6px; margin: 3px" >
                               </i>
                           </div>
                           <div>
                               <h1 style="color: white">
                                   477 505 8877
                               </h1>
                               <em style="color: ghostwhite">
                                    24/7 CUSTOMER CARE AVAILABLE
                               </em>
                           </div>

                       </div>
                   </div>
               </div>
            </div>
            <div class="linhtinh-main" style="padding: 20px">
                    <div class="lintinh-main-content-grid">
                        <h2 style="color: #f5f8ff">
                            About us
                        </h2>
                        <p style="color: ghostwhite">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis distinctio dolores dolorum exercitationem impedit in ipsa magni nihil nostrum numquam placeat quia recusandae, sed, tempora totam, ullam vitae voluptatum.
                        </p>
                    </div>
                    <div class="lintinh-main-content-grid">
                        <h2 style="color: #f5f8ff">
                            Information
                        </h2>
                        <ul style="padding-left: 0">
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="">Delivery Information</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="">Customer Service</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="">Order Tracking</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="">Shipping & Return</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="contactUs">Contact Us</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="shopFact">FREQUENTLY ASKED QUESTIONS</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="">Careers</a>
                            </li>
                            <li class="list-unstyled">
                                <i class="fa fa-angle-right">

                                </i>
                                <a href="privacyPolicy">PRIVACY POLICY</a>
                            </li>
                        </ul>
                    </div>
                    <div class="lintinh-main-content-grid"id="lastest" >
                        <h2 style="color: #f5f8ff">
                            Latest Tweets
                        </h2>
                        <div class="lastest-content" style="width: 100%;">
                            <p style="color: ghostwhite">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, amet aperiam autem cumque dicta, dolorem dolorum esse eveniet impedit ipsum minus natus nostrum omnis perferendis perspiciatis provident quidem voluptatibus?
                            </p>
                        </div>
                        <div class="lastest-content" style="width: 100%;">
                            <p style="color: ghostwhite">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur cupiditate dignissimos dolorem ea eligendi ex facere fugiat id ipsa, nesciunt obcaecati officiis placeat, quis rem velit veritatis vero voluptas! Accusantium asperiores aspernatur enim est fuga iusto minima molestias odio perferendis possimus repellat sapiente soluta tempore, temporibus totam vitae voluptate.

                            </p>
                        </div>

                    </div>
                    <div class="lintinh-main-content-grid">
                        <h2 style="color: #f5f8ff;padding-left: 20px">
                            <a href="contactUs">Our contacts</a>
                        </h2>
                        <div style="padding-left: 20px">
                            <p style="color: ghostwhite">
                                35, Lorem Lis Street, Park Ave
                                California, US
                                <br>
                                Phone: 300 323 3456
                                <br>
                                Fax: 300 323 1456
                                <br>
                                Email: <a href="">info@metronic.com</a>
                                <br>
                                Skype: <a href="">metronic</a>
                            </p>

                        </div>
                    </div>
                    <div class="linhtinh-main-content-grid-bottom"  >
                        <ul class="social-icons" style="list-style: none;padding-top: 10px">
                            <li style="padding: 2px" >
                                <a class="rss" data-original-title="rss" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="facebook" data-original-title="facebook" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="twitter" data-original-title="twitter" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="googleplus" data-original-title="googleplus" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="linkedin" data-original-title="linkedin" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="youtube" data-original-title="youtube" href="javascript:;">
                                </a>
                            </li>
                            <li style="padding: 2px" >
                                <a class="skype" data-original-title="skype" href="javascript:;">
                                </a>
                            </li>
                        </ul>
                        <div>
                            <h3>
                                NEWSLETTER
                            </h3>
                            <form action="">
                                <div style="border-style: solid;border-color: #e0dedc;border-width: thin; width: 350px;height: 32,55px;display: grid;grid-template-columns:  71.5% 27.5%">
                                    <input type="text" style="border-style:none;padding-left: 10px; width: 270px;background-color: transparent" placeholder="youremail@mail.com">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" style="background-color: orangered;width: 100px;border-radius: 0px;border-color: transparent">SUBSCRIBE
                                    </button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="linhtinh-footer">
                <div class="col-md-4 col-sm-4 padding-top-10" style="justify-self: center;padding-top: 20px">
                    <p style="color: ghostwhite">
                        2015 © Keenthemes. ALL Rights Reserved.
                    </p>
                </div>
                <div style="padding-top: 20px">
                    <ul class="list-unstyled list-inline pull-left">
                        <li>
                            <img src="../images/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express">
                        </li>
                        <li>
                            <img src="../images/payments/MasterCard.jpg" alt="We accept American Express" title="We accept American Express">
                        </li>
                        <li>
                            <img src="../images/payments/PayPal.jpg" alt="We accept American Express" title="We accept American Express">
                        </li>
                        <li>
                            <img src="../images/payments/visa.jpg" alt="We accept American Express" title="We accept American Express">
                        </li>
                        <li>
                            <img src="../images/payments/western-union.jpg" alt="We accept American Express" title="We accept American Express">
                        </li>
                    </ul>
                </div>
                <div >
                    <p class="pull-right" style="padding-top: 20px;color: ghostwhite">
                        "Powered by: "
                        <a href="http://www.keenthemes.com/" style="color:#e6400c; text-decoration: none ">KeenThemes.com</a>
                    </p>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();
                Layout.initOWL();
                Layout.initTwitter();
                Layout.initImageZoom();
                Layout.initTouchspin();
                Layout.initUniform();
                Layout.initSliderRange();
            });
        </script>
    </div>
</body>


