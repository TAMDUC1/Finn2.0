
@extends('layouts.webBottom')

@section('web')
    <div class="container">
        <div aria-label="breadcrumb" style="background-color: transparent">
            <ol class="breadcrumb" style="background-color: transparent">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">Store</a>
                </li >
                <li class="breadcrumb-item active">
                    <a href="" style="color: #8b0a1c!important;" >Check Out</a>
                </li>
            </ol>
        </div>
        <div class="" id="checkout-page">
            <h1>CHECKOUT</h1>
            <div class="panel-group checkout-page accordion scrollable ">
                <div id="checkout"class="panel panel-default" >
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" href="#checkout-content" data-parent="#checkout-page" class="accordion-toggle" style="color: white!important;" >
                                Step 1: Checkout Options
                            </a>
                        </h2>
                    </div>
                    <div class="panel-collapse collapse" id="checkout-content">
                        <div class="panel-body row">
                            <div class="col-md-6 col-sm-6">
                                <h3>New Customer</h3>
                                <p>Checkout Options:</p>
                                <div class="radio-list">
                                    <label>
                                        <div class="radio"><span><input type="radio" name="account" value="register"></span></div> Register Account
                                    </label>
                                    <label>
                                        <div class="radio"><span><input type="radio" name="account" value="guest"></span></div> Guest Checkout
                                    </label>
                                </div>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                <button class="btn btn-primary collapsed" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content" aria-expanded="false">Continue</button>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h3>Returning Customer</h3>
                                <p>I am a returning customer.</p>
                                <form role="form" action="#">
                                    <div class="form-group">
                                        <label for="email-login">E-Mail</label>
                                        <input type="text" id="email-login" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-login">Password</label>
                                        <input type="password" id="password-login" class="form-control">
                                    </div>
                                    <a href="javascript:;">Forgotten Password?</a>
                                    <div class="padding-top-20">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                    <hr>
                                    <div class="login-socio">
                                        <p class="text-muted">or login using:</p>
                                        <ul class="social-icons">
                                            <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                            <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                            <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                            <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="payment-address" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle" aria-expanded="true">
                                Step 2: Account &amp; Billing Details
                            </a>
                        </h2>
                    </div>
                    <div id="payment-address-content" class="panel-collapse collapse in" aria-expanded="true" style="">
                        <div class="panel-body row">
                            <div class="col-md-6 col-sm-6">
                                <h3>Your Personal Details</h3>
                                <div class="form-group">
                                    <label for="firstname">First Name <span class="require">*</span></label>
                                    <input type="text" id="firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name <span class="require">*</span></label>
                                    <input type="text" id="lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail <span class="require">*</span></label>
                                    <input type="text" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone <span class="require">*</span></label>
                                    <input type="text" id="telephone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" id="fax" class="form-control">
                                </div>

                                <h3>Your Password</h3>
                                <div class="form-group">
                                    <label for="password">Password <span class="require">*</span></label>
                                    <input type="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Password Confirm <span class="require">*</span></label>
                                    <input type="text" id="password-confirm" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h3>Your Address</h3>
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" id="company" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address1">Address 1</label>
                                    <input type="text" id="address1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address2">Address 2</label>
                                    <input type="text" id="address2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="city">City <span class="require">*</span></label>
                                    <input type="text" id="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="post-code">Post Code <span class="require">*</span></label>
                                    <input type="text" id="post-code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country <span class="require">*</span></label>
                                    <select class="form-control input-sm" id="country">
                                        <option value=""> --- Please Select --- </option>
                                        <option value="244">Aaland Islands</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="region-state">Region/State <span class="require">*</span></label>
                                    <select class="form-control input-sm" id="region-state">
                                        <option value=""> --- Please Select --- </option><option value="3513">Aberdeen</option><option value="3514">Aberdeenshire</option><option value="3515">Anglesey</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <div class="checker"><span><input type="checkbox"></span></div> I wish to subscribe to the OXY newsletter.
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <div class="checker"><span class="checked"><input type="checkbox" checked="checked"></span></div> My delivery and billing addresses are the same.
                                    </label>
                                </div>
                                <button class="btn btn-primary  pull-right collapsed" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-address-content" id="button-payment-address" aria-expanded="false">Continue</button>
                                <div class="checkbox pull-right">
                                    <label>
                                        <div class="checker"><span><input type="checkbox"></span></div> I have read and agree to the <a title="Privacy Policy" href="javascript:;">Privacy Policy</a> &nbsp;&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shipping-address" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle collapsed" aria-expanded="false">
                                Step 3: Delivery Details
                            </a>
                        </h2>
                    </div>
                    <div id="shipping-address-content" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="firstname-dd">First Name <span class="require">*</span></label>
                                    <input type="text" id="firstname-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname-dd">Last Name <span class="require">*</span></label>
                                    <input type="text" id="lastname-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email-dd">E-Mail <span class="require">*</span></label>
                                    <input type="text" id="email-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telephone-dd">Telephone <span class="require">*</span></label>
                                    <input type="text" id="telephone-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fax-dd">Fax</label>
                                    <input type="text" id="fax-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company-dd">Company</label>
                                    <input type="text" id="company-dd" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="address1-dd">Address 1</label>
                                    <input type="text" id="address1-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address2-dd">Address 2</label>
                                    <input type="text" id="address2-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="city-dd">City <span class="require">*</span></label>
                                    <input type="text" id="city-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="post-code-dd">Post Code <span class="require">*</span></label>
                                    <input type="text" id="post-code-dd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="country-dd">Country <span class="require">*</span></label>
                                    <select class="form-control input-sm" id="country-dd">
                                        <option value=""> --- Please Select --- </option>
                                        <option value="244">Aaland Islands</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="region-state-dd">Region/State <span class="require">*</span></label>
                                    <select class="form-control input-sm" id="region-state-dd">
                                        <option value=""> --- Please Select --- </option><option value="3513">Aberdeen</option><option value="3514">Aberdeenshire</option><option value="3515">Anglesey</option><option value="3516">Angus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary  pull-right collapsed" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content" aria-expanded="false">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shipping-method" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle collapsed" aria-expanded="false">
                                Step 4: Delivery Method
                            </a>
                        </h2>
                    </div>
                    <div id="shipping-method-content" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body row">
                            <div class="col-md-12">
                                <p>Please select the preferred shipping method to use on this order.</p>
                                <h4>Flat Rate</h4>
                                <div class="radio-list">
                                    <label>
                                        <div class="radio"><span><input type="radio" name="FlatShippingRate" value="FlatShippingRate"></span></div> Flat Shipping Rate
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="delivery-comments">Add Comments About Your Order</label>
                                    <textarea id="delivery-comments" rows="8" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary  pull-right collapsed" type="submit" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content" aria-expanded="false">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="payment-method" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle collapsed" aria-expanded="false">
                                Step 5: Payment Method
                            </a>
                        </h2>
                    </div>
                    <div id="payment-method-content" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body row">
                            <div class="col-md-12">
                                <p>Please select the preferred payment method to use on this order.</p>
                                <div class="radio-list">
                                    <label>
                                        <div class="radio"><span><input type="radio" name="CashOnDelivery" value="CashOnDelivery"></span></div> Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="delivery-payment-method">Add Comments About Your Order</label>
                                    <textarea id="delivery-payment-method" rows="8" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary  pull-right collapsed" type="submit" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content" aria-expanded="false">Continue</button>
                                <div class="checkbox pull-right">
                                    <label>
                                        <div class="checker"><span><input type="checkbox"></span></div> I have read and agree to the <a title="Terms &amp; Conditions" href="javascript:;">Terms &amp; Conditions </a> &nbsp;&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="confirm" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="background-color: grey">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle collapsed" aria-expanded="false">
                                Step 6: Confirm Order
                            </a>
                        </h2>
                    </div>
                    <div id="confirm-content" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body row">
                            <div class="col-md-12 clearfix">
                                <div class="table-wrapper-responsive">
                                    <table>
                                        <tbody><tr>
                                            <th class="checkout-image">Image</th>
                                            <th class="checkout-description">Description</th>
                                            <th class="checkout-model">Model</th>
                                            <th class="checkout-quantity">Quantity</th>
                                            <th class="checkout-price">Price</th>
                                            <th class="checkout-total">Total</th>
                                        </tr>
                                        <tr>
                                            <td class="checkout-image">
                                                <a href="javascript:;"><img class="img-responsive" src="../images/products/model3.jpg" alt="Berry Lace Dress" style="width: 100px"></a>
                                            </td>
                                            <td class="checkout-description">
                                                <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                                                <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                                                <em>More info is here</em>
                                            </td>
                                            <td class="checkout-model">RES.193</td>
                                            <td class="checkout-quantity">1</td>
                                            <td class="checkout-price"><strong><span>$</span>47.00</strong></td>
                                            <td class="checkout-total"><strong><span>$</span>47.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="checkout-image">
                                                <a href="javascript:;"><img class="img-responsive" src="../images/products/model4.jpg" alt="Berry Lace Dress" style="width: 100px"></a>
                                            </td>
                                            <td class="checkout-description">
                                                <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                                                <p><strong>Item 2</strong> - Color: Green; Size: S</p>
                                                <em>More info is here</em>
                                            </td>
                                            <td class="checkout-model">RES.193</td>
                                            <td class="checkout-quantity">1</td>
                                            <td class="checkout-price"><strong><span>$</span>47.00</strong></td>
                                            <td class="checkout-total"><strong><span>$</span>47.00</strong></td>
                                        </tr>
                                        </tbody></table>
                                </div>
                                <div class="checkout-total-block">
                                    <ul>
                                        <li>
                                            <em>Sub total</em>
                                            <strong class="price"><span>$</span>47.00</strong>
                                        </li>
                                        <li>
                                            <em>Shipping cost</em>
                                            <strong class="price"><span>$</span>3.00</strong>
                                        </li>
                                        <li>
                                            <em>Eco Tax (-2.00)</em>
                                            <strong class="price"><span>$</span>3.00</strong>
                                        </li>
                                        <li>
                                            <em>VAT (17.5%)</em>
                                            <strong class="price"><span>$</span>3.00</strong>
                                        </li>
                                        <li class="checkout-total-price">
                                            <em>Total</em>
                                            <strong class="price"><span>$</span>56.00</strong>
                                        </li>
                                    </ul>
                                    <div>
                                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="embedgooglemaps.com/">https://embedgooglemaps.com/en/</a></small></div><div><small><a href=""></a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(51.5073509,-0.12775829999998223),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.5073509,-0.12775829999998223)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>London, United Kingdom<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                            </div>
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
@extends('layouts.webTop2')
