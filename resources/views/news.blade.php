@extends('layouts.top')
@section('news')
    <script type="text/javascript">
        $(document).ready(function () {
            var url = 'https://newsapi.org/v2/top-headlines?' +
                'country=us&' +
                'apiKey=2d06707112a240938a6bd58670d0f1ed';
            var req = new Request(url);
            fetch(req).then(function (response) {
                //console.log(response.json());
                var promise1 = Promise.resolve(response.json());
                promise1.then(function(value) {
                 //   console.log(value.articles);
                    var front = value.articles[0];
                    var img = value.articles[0].urlToImage;
                    var frontDiv =
                        "<div class='newsFrontPost'>"
                            +"<a href='"+front.url+"'><img class='img-responsive' style='width: 100%' src="+img+"></a>"
                            + "<h4 class='panel-title' style='color: #8b0a1c'>"+front.title +"</h4>"
                            + "<h8> Reporter : "+ front.author +"</h8>"+"</br>"
                            + "<span style='float: left;padding-left: 10px;margin: 20px'>"
                            + front.description
                            +"</span>"+"</br>"
                        +"</div>";
                    $('.newsFront').append(frontDiv);
                    for (m = 1; m <14; ++m) {
                        var side1 = value.articles[m];
                        var img2 = value.articles[m].urlToImage;
                        var side1Div =
                            "<div class='panel-title art'>"
                            +"<strong>"
                            + "<p style='color: black'>" +
                                side1.title +
                            "</p>"
                            +"</strong>"
                            + "<a href='"+side1.url+"'><img class='img-responsive miniImage' style='float: left; margin: 15px 15px 15px 15px;width: 50%' src="+img2+"></a>"
                            + side1.description
                            + "</div>"
                        ;
                        $('.newsMainPart2Left').append(side1Div);
                    }
                });
            })
            var urlFinan = 'https://newsapi.org/v2/top-headlines?sources=financial-times&apiKey=2d06707112a240938a6bd58670d0f1ed';
            var reqFinan = new Request(urlFinan);
            fetch(reqFinan).then(function (response) {
                var promise2 = Promise.resolve(response.json());
                promise2.then(function (value) {
                    var k;
                    for (k = 0; k < 3; ++k) {
                        var side = value.articles[k];
                        var img1 = value.articles[k].urlToImage;
                        var sideDiv =
                            "<div class='newsFrontSide'>"
                                +"<a href='"+side.url+"'><img class='img-responsive' style='width: 100%' src="+img1+"></a>"
                                + "<h6 class='panel-title'>"+side.title +"</h6>"
                            +"</div>";
                        $('.newsMini').append(sideDiv);
                    }
                })
            })
            var urlTech = 'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=2d06707112a240938a6bd58670d0f1ed';
            var reqTech = new Request(urlTech);
            fetch(reqTech).then(function (response) {
                var promise3 = Promise.resolve(response.json());
                promise3.then(function (value) {
                    var k;
                    for (k = 0; k < 10; ++k) {
                        var side = value.articles[k];
                        var img1 = value.articles[k].urlToImage;
                        var sideDiv =
                            "<div class='panel-title art'>"
                            +"<strong>"
                            + "<p style='color: black'>" +
                            side.title +
                            "</p>"
                            +"</strong>"
                            + "<a href='"+side.url+"'><img class='img-responsive miniImage' style='float: left; margin: 15px 15px 15px 15px;width: 50%' src="+img1+"></a>"
                            + side.description
                            + "</div>"
                        $('.newsMainPart2Right').append(sideDiv);
                    }
                })
            })
        })
    </script>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    News
                </li>
            </ol>
        </nav>
    </div>
    <div class="mainNews">
        <div style="padding-right: 5px">
            <div style="height: 400px;border-width: thin;margin: 0px 0px 0px 0px">
                <img class="img-responsive" src="{{URL::asset('/images/ads1.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >
            </div>
            <div style="height: 200px;border-width: thin;margin-top:10px ">
                <img class="img-responsive" src="{{URL::asset('/images/ads2.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 300px;border-width: thin;margin-top: 10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads3.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 400px;border-width: thin;margin-top: 10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads4.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 500px;border-width: thin;margin-top: 10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads5.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >
            </div>
        </div>
        <div>
            <div class="newsMain" style="">
                <div class="newsFront">
                </div>
                <div class="newsMini">
                    <div class="btn-success text-center">
                        <strong>Financial-times</strong>
                    </div>
                </div>
            </div>
            <div class="newsMainPart2">
                <div class="newsMainPart2Left" style="">
                </div>
                <div class="newsMainPart2Right" style="">
                    <div>
                        <script type="text/javascript" src="https://tygiadola.com/TyGiaScript/short/Widgets"> </script>
                        <noscript> Vui lòng bật javascript để xem <a href="https://tygiadola.com/">tỷ giá</a></noscript>
                    </div>
                    <noscript> Vui lòng bật javascript để xem <a href="http://giavangvn.org">giá vàng</a></noscript>
                    <div class="btn-success text-center">
                        <strong>Tech</strong>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-left: 5px">
            <div style="height: 400px;border-width: thin;margin: 0px 0px 0px 0px">
                <img class="img-responsive" src="{{URL::asset('/images/ads5.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >
            </div>
            <div style="height: 200px;border-width: thin;margin-top:10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads4.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 300px;border-width: thin;margin-top:10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads3.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 400px;border-width: thin;margin-top: 10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads2.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >

            </div>
            <div style="height: 500px;border-width: thin;margin-top: 10px">
                <img class="img-responsive" src="{{URL::asset('/images/ads1.jpg')}}" alt="profile Pic" width="100%" height="100%" style="" >
            </div>
        </div>
    </div>
@endsection
