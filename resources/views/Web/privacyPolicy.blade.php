
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
        <div class="main-content-pivacyPolicy" style="width: 100%!important;margin-top: 20px">
            <h1>PRIVACY POLICY</h1>
            <div class="content-page">
                <h2>How we use your information</h2>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>

                <h2>Use and storage of data</h2>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </p>

                <h3>Investigationes demonstraverunt</h3>
                <ul>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Claritas est etiam processus dynamicus</li>
                    <li>Duis autem vel eum iriure dolor</li>
                    <li>Eodem modo typi</li>
                </ul>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>

                <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
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
