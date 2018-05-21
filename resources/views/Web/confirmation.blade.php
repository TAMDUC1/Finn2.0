@section('web')
    <div class="main-showCartItems">
        <div class="main-sidebar" >
        </div>
        <div>
            <div class="main-content-showCartItems" >
                @if($order1)
                    @foreach($order1 as $R)
                        <div class="table-wrapper-responsive" style="margin-bottom: 10px">
                               <div class="card" style="margin-bottom: 10px" >
                                    <div class="card-body" style="background-color: lightgrey;">
                                        <h4 class="card-title" style="color: black">
                                            Order {{$R->id}} Summary <br>
                                            <footer class="blockquote-footer"><cite title="Source Title">{{$R->created_at}}</cite></footer>
                                        </h4>
                                    </div>
                                   <div style="padding-left: 20px">
                                       @foreach($orderItems as $O)
                                           @if($O->order_id === $R->id)
                                               {{$O->id}}
                                               <img style="width: 50px" class="img-responsive" src="{{ url('storage/images/productImages/'.$O->imagePath) }}" alt="" title="" />
                                               <strong>  {{$O->name}} ( {{$O->amount}} pieces)</strong> <br>
                                               <strong>Unit Price :{{$O->product->price}}</strong> <br>
                                           @endif
                                       @endforeach
                                   </div>
                                    <div style="padding-left: 20px" >
                                        <div class="card-text" id="totalPrice1">
                                            @if($R)
                                                <strong>Total Prices :<span>$</span>{{$R->totalPrice}}</strong>
                                            @endif
                                        </div>
                                    </div>

                                   <h4 class="card-title card-body" style="color: black">
                                       Delivery Info
                                   </h4>
                                   <div style="padding-left: 20px">
                                       <div class="card-text">
                                           <strong>Name :</strong>   {{$R->receiverName}}
                                       </div>
                                       <div class="card-text">
                                           <strong>Phone :</strong> {{$R->receiverPhone}}
                                       </div>
                                       <div class="card-text">
                                           <strong>Delivery Address :</strong> {{$R->deliveryAddress}}
                                       </div>
                                       <div class="card-text">
                                           <strong>City :</strong>  {{$R->city}}
                                       </div>
                                       <div class="card-text">
                                           <strong>Email :</strong> {{$R->email}}
                                       </div>

                                </div>
                        </div>
                    @endforeach
               @endif
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
@extends('layouts.webTop2')
