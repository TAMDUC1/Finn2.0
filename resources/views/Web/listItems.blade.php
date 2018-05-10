
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
        <div class="main-content-listItems-top pull-right" style="padding-right: 9%">
            <div>
                <label class="control-label" for="">Search Products</label>
                <input id="myInput" class="form-control input-sm" type="text" style="width: 300px" placeholder="Search..">
            </div>
            <div>
                <label class="control-label">Sort&nbsp;By:</label>
                <select id="mySelect" class="form-control input-sm" style="width: 100px">
                    <option value="default"></option>
                    <option value="name-desc">nameDesc</option>
                    <option value="name">NameAsc</option>
                </select>
            </div>
        </div>
        <div id="search" class="main-content-listItems" style="padding-right: 5%;padding-top: 2%">
            @foreach($sorted as $p)
                @if($p->imagePath)
                <div id="test1" class="card" style="width:200px" data-name="{{$p->name}}" data-price="{{$p->price}}">
                    <span data-name="{{$p->name}}" data-price="{{$p->price}}>
                        <a href="{{action('ProductController@show', $id = $p->id)}}"><img class="card-img-top img-thumbnail img-responsive" src="{{ url('storage/images/productImages/'.$p->imagePath) }}"alt="Card image" title="" />
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">{{$p->name}}</h4>
                            <p class="card-text">{{$p->description}}</p>
                            <p class="card-text">Price: {{$p->price}}</p>
                            <a class="btn btn-success" style="width: 150px" href="{{action('CartController@addItemsToCart',$id=$p->id)}}"> Add to Cart PHP</a>
                            <a class="btn btn-success addToCart" style="width: 150px" href="#" data-id="{{$p->id}}"data-token="{{ csrf_token() }}">Add via Javascript</a>
                        </div>
                    </span>
                </div>
            @endif
            @endforeach
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
        $('#mySelect').on('change', function() {
            var value = $(this).val();
            switch (value) {
                case 'name':
                    tinysort('div#test1>span');
                    break;
                case 'name-desc':
                    tinysort('div#test1>span',{attr:'data-name',order:'desc'});
                    break;
                default:
            }
        });
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#search div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.addToCart').click(function (e) {
                e.preventDefault();
                var _this = $(this);
                var params = _this.data();
                var token = $(this).data('token');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "get",
                    url: "/addItemToCart/" + params.id,
                    data: {},
                    success: function (data) {
                        $("#myDiv").load(location.href + " #myDiv");
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            $('#' + key).parent().addClass('error');
                        });
                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.webTop')
