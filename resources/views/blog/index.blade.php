<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            $(document).ready(function () {
                var blogCount = 1;
                var Url = 'index1';
                $('#getRequest').click(function ()
                {
                    $.get('index1',function (data) {
                        $('#comments').append(data);
                        console.log(data);
                    })
                })
                $(function()
                {
                    //----- OPEN
                    $('[data-popup-open]').on('click', function(e)  {
                        var targeted_popup_class = jQuery(this).attr('data-popup-open');
                        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                        e.preventDefault();
                    });

                    //----- CLOSE
                    $('[data-popup-close]').on('click', function(e)  {
                        var targeted_popup_class = jQuery(this).attr('data-popup-close');
                        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
                        e.preventDefault();
                    });
                });
            })
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="ha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6">
            @if (!session('email'))
                    <a href="signUp" class="btn  float-right">SignUp</a>
                    <a href="login" class="btn  float-right">Login</a>
            @endif
            @if (session('email'))
                <form method="post" action="{{action('UserController@logout')}}">
                    {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger float-right" >Log out</button>
                </form>
            @endif
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Blogs
                </li>
            </ol>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    List of Blogs
                </div>
                <table class="table table-striped">
                    <thead >
                            <tr >
                                <th >#</th>
                                <th >Title</th>
                                <th >Content</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($blog as $b)
                        <tr >
                            <td>{{$b['id']}}</td>
                            <td>{{$b['title']}}</td>
                            <td>{{$b['content']}}</td>
                            @if(session('role'))
                                <form action="{{action('BlogController@destroy', $id=$b['id'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                  <td>
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                  </td>
                                </form>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </body>
</html>