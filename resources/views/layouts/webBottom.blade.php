<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/dropdown.js') !!}"></script>
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
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


