
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
                <label class="control-label" for="">Select live API currency  </label>
                <select id="myCurrency" name='currencies'>
                    <option value="USD"></option>
                    <option value='VND' title='Vietnamese Dong'>VND</option>
                </select>
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
                    <div id="test1" class="card zoom" style="width:250px;height: 100%" data-name="{{$p->name}}" data-price="{{$p->price}}">
                        <span data-name="{{$p->name}}" data-price="{{$p->price}}>
                            <a href = "{{action('ProductController@show', $id = $p->id)}}"> <img class="card-img-top img-thumbnail img-responsive" src="{{ url('storage/images/productImages/'.$p->imagePath) }}"alt="Card image" title="" />
                            </a>
                            <div class="card-body">
                                <a href="{{action('ProductController@show', $id = $p->id)}}">
                                    <h4 class="card-title">{{$p->name}}</h4>
                                </a>
                               <span>Price: <p class="card-text priceItem" data-price="{{$p->price}}">{{$p->price}} usd</p> </span>
                                <!--
                                <a class="btn btn-success" style="width: 150px" href="{{action('CartController@addItemsToCart',$id=$p->id)}}"> Add to Cart PHP</a>-->
                                <a class="btn btn-success addToCart" style="width: 150px" href="#" data-id="{{$p->id}}"data-token="{{ csrf_token() }}">Add To Cart</a>
                            </div>
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script>
        var usd;
        var slideIndex = 0;
        var vnd;
        var cad;
        var chf;
        var cny;
        var dkk;
        var eur;
        var gbp;
        var jpy;
        var nok;
        var sek;
        var sgd;
        var thb;
        var btc;
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
            $.ajax({
                url: 'http://www.apilayer.net/api/live?access_key=9b0014310065c13b40247e73fe5732a4&format=1',
                dataType: 'jsonp',
                success: function(json) {

                   //$("#ngoaiTe").html("ty gia USD lay tren apilayer : "+json.quotes.USDVND);
                    usd = parseFloat(json.quotes.USDUSD);

                    btc = parseFloat(json.quotes.USDBTC);
                    vnd = parseFloat(json.quotes.USDVND);
                    cad = parseFloat(json.quotes.USDCAD);
                    chf = parseFloat(json.quotes.USDCHF);
                    cny = parseFloat(json.quotes.USDCNY);
                    dkk = parseFloat(json.quotes.USDDKK);
                    eur = parseFloat(json.quotes.USDEUR);
                    gbp = parseFloat(json.quotes.USDGBP);
                    jpy = parseFloat(json.quotes.USDJPY);
                    nok = parseFloat(json.quotes.USDNOK);
                    sek = parseFloat(json.quotes.USDSEK);
                    sgd = parseFloat(json.quotes.USDSGD);
                    thb = parseFloat(json.quotes.USDTHB);
                    // $("#time").html(""+json.source);
                    //alert(usd);
                    // exchange rata data is stored in json.quotes
                    // alert(json.quotes.USDGBP);

                    // source currency is stored in json.source
                    //alert(json.source);

                    // timestamp can be accessed in json.timestamp
                    //alert(json.timestamp);

                }
            });
            $('#myCurrency').on('change', function()
            {
                var value = $(this).val();
                switch (value) {

                    case 'VND':
                        $('.priceItem').each(function(index,obj){
                            $(obj).html(parseInt($(obj).text())*vnd +" vnd" );
                        });
                       // var numb = parseInt($('.priceItem').text());
                        break;
                    //  case '':
                    //  tinysort('div#test1>span',{attr:'data-name',order:'desc'});
                    // break;
                    default:

                }
            });
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#search div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.category').click(function (e) {
                e.preventDefault();
                console.log('clicked');
                var _this = $(this);
                var params = _this.data();
                console.log(params.id);

                var token = $(this).data('token');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "get",
                    url: "/categories/" + params.id,
                    data: {},
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            $('#' + key).parent().addClass('error');
                        });
                    }
                });
            });
            $('.addToCart').click(function (e) {
                e.preventDefault();
                console.log('er');
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
