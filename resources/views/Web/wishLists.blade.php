
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
        <div class="main-content-wishLists">
            <div class="goods-page">
                <div class="goods-data clearfix">
                    <div class="table-wrapper-responsive">
                        <table summary="Shopping cart">
                            <tbody><tr>
                                <th class="goods-page-image">Image</th>
                                <th class="goods-page-description">Description</th>
                                <th class="goods-page-stock">Stock</th>
                                <th class="goods-page-price" colspan="2">Unit price</th>
                            </tr>
                            <tr>
                                <td class="goods-page-image">
                                    <a href="javascript:;"><img class="img-responsive" src="../images/products/model3.jpg" alt="Berry Lace Dress" style="width: 100px"></a>
                                </td>
                                <td class="goods-page-description">
                                    <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                                    <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                                    <em>More info is here</em>
                                </td>
                                <td class="goods-page-stock">
                                    In Stock
                                </td>
                                <td class="goods-page-price">
                                    <strong><span>$</span>47.00</strong>
                                </td>
                                <td class="del-goods-col">
                                    <a class="del-goods" href="javascript:;">&nbsp;</a>
                                    <a class="add-goods" href="javascript:;">&nbsp;</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="goods-page-image">
                                    <a href="javascript:;"><img class="img-responsive" src="../images/products/model4.jpg" alt="Berry Lace Dress" style="width: 100px"></a>
                                </td>
                                <td class="goods-page-description">
                                    <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                                    <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                                    <em>More info is here</em>
                                </td>
                                <td class="goods-page-stock">
                                    In Stock
                                </td>
                                <td class="goods-page-price">
                                    <strong><span>$</span>47.00</strong>
                                </td>
                                <td class="del-goods-col">
                                    <a class="del-goods" href="javascript:;">&nbsp;</a>
                                    <a class="add-goods" href="javascript:;">&nbsp;</a>
                                </td>
                            </tr>
                            </tbody></table>
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
