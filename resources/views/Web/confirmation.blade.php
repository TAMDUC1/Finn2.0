@section('web')
    <div class="main-showCartItems">
        <div class="main-sidebar" >
        </div>
        <div>
            <div class="main-content-showCartItems">
                <div class="table-wrapper-responsive">
                    <div class="card" >
                        <div class="card-body" style="background-color: lightgrey">
                            <h4 class="card-title">
                                Order Summary
                            </h4>
                        </div>
                        <div style="padding-left: 20px" >
                            @foreach($orderItems1 as $O)
                                @if($O->imagePath)
                                    @if($O->totalPrice)
                                        <div data-name="{{$O->name}}" id="orderItemTotalPrice2{{$O->product->id}}" class="card-text">
                                            <span>{{$O->product->name}} : ${{$O->totalPrice}}</span>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <div class="card-text" id="totalPrice1">
                                <strong><span>$</span>{{$cart->totalPrice}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-title" style="background-color: lightgrey">
                            Delivery Info
                        </h4>
                        <div style="padding-left: 20px">
                            <div class="card-text">
                                {{$order1->receiverName}}

                            </div>
                            <div class="card-text">
                                {{$order1->receiverPhone}}

                            </div>
                            <div class="card-text">

                                {{$order1->deliveryAddress}}

                            </div>
                            <div class="card-text">

                                {{$order1->city}}
                            </div>
                            <div class="card-text">

                                {{$order1->email}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content-checkoutForm">
                </div>
                <div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function ()
            {
            });
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
