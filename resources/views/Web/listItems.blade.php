
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
            <div></div>
                <div>
                    <label class="control-label">Sort&nbsp;By:</label>
                    <select class="form-control input-sm" style="width: 100px">
                        <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                        <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                        <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                        <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                        <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                        <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                        <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                        <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                        <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                    </select>
                </div>
                <div>
                    <label class="control-label">Show</label>
                    <select class="form-control input-sm" style="width: 100px">
                        <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">24</option>
                        <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                        <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                        <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                        <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>

                    </select>
                </div>
        </div>

        <div class="main-content-listItems" style="padding-right: 5%;padding-top: 2%">
            @foreach($product as $p)
                @if($p->imagePath)
                <div class="card" style="width:200px">
                    <a href="{{action('ProductController@show', $id = $p->id)}}" style="margin:1px "> <img class="card-img-top img-thumbnail img-responsive" src="{{ url('storage/images/productImages/'.$p->imagePath) }}" alt="Card image" title="" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{$p->name}}</h4>
                        <p class="card-text">{{$p->description}}</p>
                        <p class="card-text">Price: {{$p->price}}</p>
                        <a class="btn btn-success" href="{{action('CartController@addItemsToCart',$id=$p->id)}}"> Add to Cart</a>
                    </div>
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
    </script>
@endsection
@extends('layouts.webTop')
