
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
                   Best Seller1
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
        <div class="main-content-shopFact" style="width: 100%!important;margin-top: 20px">
            <div class="" id="checkout-page">
                <h1>FREQUENTLY ASKED QUESTIONS</h1>
                <div class="panel-group checkout-page accordion scrollable ">
                    <div id="checkout"class="panel panel-default" >
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" href="#checkout-content" data-parent="#checkout-page" class="accordion-toggle" style="color: white!important;" >
                                   1: Warranty
                                </a>
                            </h2>
                        </div>
                        <div class="panel-collapse collapse" id="checkout-content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam ipsam laudantium minus nesciunt quibusdam. Aliquid atque distinctio facilis fuga laboriosam laudantium quisquam repellat tenetur unde veniam! Nisi pariatur porro sunt!
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae expedita optio quas, qui quod ullam unde vitae. Ab animi aperiam assumenda at cum cupiditate deleniti distinctio dolores doloribus, ea earum eligendi facere hic illum incidunt libero magni nam nemo officiis quia quos rem, reprehenderit rerum soluta suscipit tempora veritatis!
                           </p>
                        </div>
                    </div>
                    <div id="payment-address" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle" aria-expanded="true">
                                    2: Account &amp; Billing Details
                                </a>
                            </h2>
                        </div>
                        <div id="payment-address-content" class="panel-collapse collapse in" aria-expanded="true" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci animi at cupiditate distinctio est ex iure iusto laudantium maxime non, obcaecati placeat praesentium quam quia quisquam quo recusandae reprehenderit rerum sequi sit tenetur veniam, vitae voluptate voluptates! Beatae cum dolorem doloremque ducimus modi, saepe ullam. Cum deserunt hic maiores. A ab beatae blanditiis consectetur ea eius fuga itaque iure nulla numquam, quidem quos? Beatae iste laboriosam tempora. Et, voluptas.</p>
                        </div>
                    </div>
                    <div id="shipping-address" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle collapsed" aria-expanded="false">
                                    3: Delivery
                                </a>
                            </h2>
                        </div>
                        <div id="shipping-address-content" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem blanditiis excepturi fugit in placeat qui reiciendis suscipit. Consequatur dolorum fugiat impedit, itaque quaerat ullam vel. Accusantium animi cumque eveniet optio, sunt tempore temporibus unde! Consequuntur deleniti dolorum hic incidunt ipsam nam possimus quo rerum sapiente sunt. A animi commodi explicabo id ipsam possimus totam. A architecto asperiores atque blanditiis commodi cumque et eum excepturi exercitationem illo illum inventore ipsam ipsum itaque libero magni minima molestias nemo placeat quia quo repellendus reprehenderit sequi sint, velit vero vitae voluptas. Maxime, soluta.
                            </p>
                        </div>
                    </div>
                    <div id="shipping-method" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle collapsed" aria-expanded="false">
                                4: Delivery Method
                                </a>
                            </h2>
                        </div>
                        <div id="shipping-method-content" class="panel-collapse collapse" aria-expanded="false">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consectetur corporis debitis deleniti doloremque dolorum earum eum, expedita facilis id illo, ipsam magni necessitatibus nesciunt perspiciatis quasi quod similique ut! Aspernatur at delectus deleniti error minima nisi quo. Maxime, voluptates?</p>
                        </div>
                    </div>
                    <div id="payment-method" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle collapsed" aria-expanded="false">
                                    5: Payment refund
                                </a>
                            </h2>
                        </div>
                        <div id="payment-method-content" class="panel-collapse collapse" aria-expanded="false">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem inventore, nemo. Alias amet, cumque dolor dolorem eum exercitationem, in maiores mollitia necessitatibus non optio pariatur placeat possimus qui, recusandae reiciendis temporibus veniam voluptates. Accusamus asperiores cupiditate dolores ipsam natus quasi quo quos sunt veritatis, voluptas! Aperiam atque doloremque est mollitia nostrum odit provident quos repudiandae rerum vel? Aut, eos, incidunt! Alias aliquam at consequuntur distinctio doloribus, ea enim, eos eum fugit id inventore ipsum iste laborum magnam maiores neque odio provident quasi quidem rerum saepe sapiente unde ut! Deserunt, mollitia.
                            </p>
                        </div>
                    </div>
                    <div id="confirm" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="background-color: grey">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle collapsed" aria-expanded="false">
                                    6: Customer Service
                                </a>
                            </h2>
                        </div>
                        <div id="confirm-content" class="panel-collapse collapse" aria-expanded="false">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium corporis delectus dolorum earum nam, nobis sed tempora. Adipisci aperiam doloremque dolores error esse eum fuga iusto, nesciunt obcaecati, officia quae quod soluta. Ad aliquid animi excepturi impedit iste laudantium libero, provident vitae voluptas! Debitis dolor est magnam minima quis? Alias earum maiores molestiae nostrum numquam officiis reiciendis rerum sed sequi. Beatae consectetur debitis distinctio ea iste labore minima omnis qui!
                                </p>
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
