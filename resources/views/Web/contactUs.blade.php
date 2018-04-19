
@extends('layouts.webBottom')

@section('web')
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
                        <a href=""style="margin-left: 20px">WISH LIST</a>
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
            <div style="width: 100%">
               <strong>
                   Best Seller
               </strong>
                <div class="best-seller" style="margin: 5px">
                    <a href="#">
                        <img class="mySlides img-fluid"  src="../images/products/k1.jpg" alt="">
                        <img class="mySlides img-fluid"  src="../images/products/k2.jpg" alt="">
                        <img class="mySlides img-fluid"  src="../images/products/k3.jpg" alt="">
                    </a>
                    <div style="margin: 4%">

                    </div>

                </div>
                <div class="best-seller"  style="margin: 5px">
                    <a href="#">
                    </a>
                    <div style="margin: 4%">

                    </div>
                </div>
                <div class="best-seller" style="margin: 5px">
                    <a href="#">
                    </a>
                    <div style="margin: 4%">

                    </div>
                </div>

            </div>
        </div>
        <div class="main-content-kid" style="width: 80%;background-color: white!important;margin-top: 20px">
            <div style="margin-top: 30px">
                <div style="margin: 2%" >
                    <img class="img-fluid"   src="../images/products/model7.jpg" alt="">
                </div>

            </div>
            <div class="main-content-kid-subRight" style="margin-top: 30px;margin-left: 5%">

                <div>
                    COOL GREEN DRESS WITH RED BELL
                </div>
                <div class="pull-left">
                    $62.00

                </div>
                <div class="pull-right">
                    Availability: In Stock
                </div>
                <div>

                    Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.
                </div>
                <div style="padding:3%;display: grid">
                    <div >
                        <label>Size</label>
                        <select class="form-control input-sm">
                            <option>L</option>
                            <option>M</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div >
                        <label for="">
                            Color
                        </label>
                        <select class="form-control input-sm">
                            <option>red</option>
                            <option>blue</option>
                            <option>black</option>
                        </select>
                    </div>

                </div>
                <div class="product-page-cart" style="display: block">
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </div>
                <div>
                    Reviews
                </div>
                <div>
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
            </div>
            <div class="container">
                <div  style="margin-top: 50px;border-bottom: 1px orangered">
                    <ul class="nav nav-tabs">
                        <li id="review"class="active"><a CLASS="btn btn-default" data-toggle="tab" href="#home">DESCRIPTION</a></li>
                        <li id="review"><a class="btn btn-default" data-toggle="tab" href="#menu1">INFORMATION</a></li>
                        <li id="review"><a class="btn btn-default" data-toggle="tab" href="#menu2">REVIEWS</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="home" class="tab-pane in active">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores iste molestiae non numquam, porro, quas quasi quidem, quod repudiandae sit suscipit velit voluptate voluptatibus! Deserunt id inventore ipsum laudantium molestiae!</p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <table class="datasheet table-responsive table-striped table-hover table-lg">
                            <tbody><tr>
                                <th colspan="2">Additional features</th>
                            </tr>
                            <tr>
                                <td class="datasheet-features-type">Value 1</td>
                                <td>21 cm</td>
                            </tr>
                            <tr>
                                <td class="datasheet-features-type">Value 2</td>
                                <td>700 gr.</td>
                            </tr>
                            <tr>
                                <td class="datasheet-features-type">Value 3</td>
                                <td>10 person</td>
                            </tr>
                            <tr>
                                <td class="datasheet-features-type">Value 4</td>
                                <td>14 cm</td>
                            </tr>
                            <tr>
                                <td class="datasheet-features-type">Value 5</td>
                                <td>plastic</td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div style="margin-top: 20px">
                               <strong>
                                   Bob
                               </strong>
                               <em>30/12/2013 - 07:37</em>
                               <div>
                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis pariatur, velit! Commodi consectetur distinctio iusto perspiciatis possimus praesentium tempora ut.
                               </div>
                        </div>
                        <div style="margin-top: 20px">
                            <strong>
                                Mary
                            </strong>
                            <em>30/12/2013 - 07:37</em>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis pariatur, velit! Commodi consectetur distinctio iusto perspiciatis possimus praesentium tempora ut.
                            </div>
                        </div>
                        <div style="margin-top: 20px">
                            <form action="#" class="reviews-form" role="form">
                                <div class="form-group">
                                    <label for="name">Name <span class="require">*</span></label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="review">Review <span class="require">*</span></label>
                                    <textarea class="form-control" rows="8" id="review"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Rating</label>
                                    <input type="range" value="4" step="0.25" id="backing5" style="display: none;">
                                    <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                        <button id="rateit-reset-5" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-5" style="display: none;"></button><div id="rateit-range-5" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-5" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="false" style="width: 80px; height: 16px;"><div class="rateit-selected rateit-preset" style="height: 16px; width: 64px; display: block;"></div><div class="rateit-hover" style="height: 16px; width: 0px; display: none;"></div></div></div>
                                </div>
                                <div class="padding-top-20">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1}
            x[slideIndex-1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }

    </script>

@endsection
@extends('layouts.webTop')
