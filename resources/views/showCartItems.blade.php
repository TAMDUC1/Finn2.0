
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
        <div>
            <div class="main-content-showCartItems">
                <div class="table-wrapper-responsive">
                    <table class="table table-responsive table-hover" id="cart-table" summary="Shopping cart">
                        <caption>SHOPPINGCART</caption>
                        <thead class="thead-light">
                        <h4>SHOPPINGCART</h4>
                        <tr>
                            <th class="goods-page-image">Image</th>
                            <th class="goods-page-description">Description</th>
                            <th class="goods-page-ref-no"></th>
                            <th class="goods-page-quantity">Quantity</th>
                            <th class="goods-page-price">Price</th>
                            <th class="goods-page-total" colspan="2"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderItems1 as $O)
                            @if($O->imagePath)
                                @if($O->totalPrice)
                                    <tr id="orderItem{{$O->product->id}}">
                                        <td>
                                            <a href="{{action('ProductController@show', $id = $O->product->id)}}" style="margin:1px ">
                                            <img style="width: 100px" class="img-responsive" src="{{ url('storage/images/productImages/'.$O->imagePath) }}" alt="" title="" />
                                            </a>
                                        </td>
                                        <td>
                                            {{$O->name}}
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="product-quantity">
                                                <form class="editQuantity" id="editQuantity{{$O->id}}" data-id="{{$O->product->id}}" method="POST" type="hidden">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH')}}
                                                    <input name="_method" value="PATCH" type="hidden">
                                                    <input class="form-control input-sm" id="product-quantity{{$O->product->id}}" type="text" value={{$O->amount}}>
                                                </form>
                                            </div>
                                        </td>
                                         <!--
                                               <td>
                                                   <div class="product-quantity">
                                                       <form method="POST" action="{{action('OrderItemController@update',$O->product_id)}}">
                                                           {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <input type="number" class="form-control" name="amount">
                                                    <button type="submit" class="btn btn-success" style="width: 70px">Change</button>
                                                </form>
                                            </div>
                                        </td>
                                        -->
                                        <td>
                                            <strong> <div id="orderItemTotalPrice{{$O->product->id}}"><span>$</span>{{$O->totalPrice}}</div></strong>
                                        </td>
                                        <td class="del-goods-col">
                                            <button class="btn btn-danger delete"  name="_method" id="delete{{$O->product->id}}" data-id="{{$O->product->id}}" data-token="{{ csrf_token() }}" >remove via Javascript</button>
                                            <form action="{{action('OrderItemController@destroy', $id = $O->product->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit" style="margin:1px;width: 168px ">Remove via PHP</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <h4>
                        Cart Total Price
                    </h4>
                    <div id="totalPrice1">
                       <strong><span>$</span>{{$cart->totalPrice}}</strong>
                    </div>
                    <div>
                        <a href="products">Continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('.editQuantity').submit(function(event)// edit product quantity
            {
                event.preventDefault();
                var params = $(this).data();
                var productQuantity = $('#product-quantity'+params.id).val();// chuyen qua id *********************************
                if(productQuantity)
                console.log(params.id);
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    console.log(productQuantity);
                    $.ajax(
                    {
                        method: "GET",
                        url: "/order_items/" + params.id +"/edit",
                        data: { quantity: productQuantity },
                        success: function (data)
                        {

                            var price = "<span>$</span>"+data.orderItemsPrice;
                            var totalPrice = " <strong><span>$</span>"+data.totalPrice+"</strong>";
                            $('#totalPrice1').html(totalPrice);
                            $('#orderItemTotalPrice'+params.id).html(price);
                        },
                        error: function (data)
                        {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value)
                            {
                            });
                        }

                    })
                }
            });
            $('.delete').click(function(e){
                event.preventDefault();
                var _this = $(this);
                var params = _this.data();
                var token = $(this).data('token');
                console.log(params.id);
                console.log(token);
                var price0 = "<strong><span>$</span>{{$cart->totalPrice}}</strong>";
                $.ajax( {
                    type : 'post',
                    url  : "/order_items/"+params.id,
                    data : {_method: 'delete', _token :token},
                    success: function (data)
                    {
                        console.log('delete');
                        console.log(data.totalPrice);
                        var totalPrice = " <strong><span>$</span>"+data.totalPrice+"</strong>";
                        console.log('wet');
                        $('#totalPrice1').html(totalPrice);
                    }
                } )
                $( "#orderItem"+params.id ).remove();
               // $('#orderItemTotalPrice'+params.id).html(price0);

            });
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
