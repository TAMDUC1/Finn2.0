<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Trirong:100,200" rel="stylesheet">
    <link href="{{ asset('css/viewcomment.css') }}" rel="stylesheet">
</head>
<body>
<button class="btn-warning">
    Load
</button>
<div class="test">
</div>

<div class="grid">
        @foreach($comment as $c)
        <a href="#" class="showComment" id="comment" data-id="{{$c->blog_id}}">Likes</a>

                <div class="char">
                    <div class="charContent">
                            <h2>
                                {{ json_encode($c->author) }}
                            </h2>
                        {{ json_encode($c->comment) }}
                    </div>
                </div>
        @endforeach
</div>

<script type="text/javascript">
    $('.showComment').click(function (event) {
        var _this = $(this);
        var params = _this.data();
        $.ajax({
            method: "GET",
            url: "/comments1/" + params.id,
            data: {},
            success: function (data) {
                // console.log('like')
                // tim cach thay gia tri
                //  console.log(data);
                // console.log(_this.data);
              //  _this.prev().text(data.like);//hien thi like
                $('.test').append(data);
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors, function (key, value) {
                    $('#' + key).parent().addClass('error');
                });
            }
        });
    });
</script>
</body>
</html>
