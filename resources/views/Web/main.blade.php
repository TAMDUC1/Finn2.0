
@extends('layouts.webBottom')

@section('web')
    <div class="mainPage-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-responsive"  src="../images/slider/bg1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="img-responsive"    src="../images/slider/bg2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="img-responsive"    src="../images/slider/bg3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div>
        <div class="New-arrivals">
            <div>
                <img class="img-responsive" src="../images/products/model3.jpg" alt="" style="width: 200px">
            </div>
            <div>
                <img class="img-responsive"  src="../images/products/model2.jpg"alt=""style="width: 200px">
            </div>
            <div>
                <img class="img-responsive"  src="../images/products/model3.jpg"alt=""style="width: 200px">
            </div>
            <div>
                <img class="img-responsive"  src="../images/products/model4.jpg"alt=""style="width: 200px">
            </div>
            <div>
                <img class="img-responsive"  src="../images/products/model5.jpg"alt=""style="width: 200px">
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
