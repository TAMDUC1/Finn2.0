
<!doctype html>
<html lang="{{ app()->getLocale() }}
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div >
            <nav class="clearfix" style="background-color: #8b8987" role="navigation">
                <form method="post" action="{{route('logout')}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger float-right" style="margin:1px ">Log out</button>
                </form>
                    @if(session('avatar'))
                        <div class=" additonal-nav-grid" >
                            <img class="img-responsive float-right" style="width:38px;border-radius: 2px " src="{{Session::get('avatar')}}" alt="">
                        </div>
                    @endif
            </nav>
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Profile
                    </li>
                </ol>
                <div class="text-info">
                </div>
            </nav>
        </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <strong><h5>Post Blog</h5></strong>
                            </div>
                            <div class="card-body">
                                <div class="content">
                                    <div>
                                        <form id="register">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{csrf_field()}}
                                            <div class="left-form" >
                                                <label for="title"style = "color: #1c679c">Title</label>
                                                <div>
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            name="title"
                                                            id="title"
                                                            style="border-color: #1c679c">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <label for="content"style = "color: #1c679c">Content</label>
                                                    <textarea class="form-control" name="content" id="content"style="border-color: #1c679c">
                                        </textarea>
                                                </div>
                                            </div>
                                            <div class="submit-button">
                                                <button type="submit" class="btn btn-warning " id="sm" ONCLICK="myFunction()">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="blogPost"></div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            console.log('123');
                            $.ajaxSetup({
                                headers:
                                    {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            console.log('444');
                            var node = document.createElement("LI");
                            function myFunction() {
                                var bTitle = $('#title').val();
                                var bContent = $('#content').val();
                                $('#blogPost').prepend('Title la :'+bTitle +' '+'Content la: '+ bContent);
                                $('#blogPost').prepend("<tr/>");
                            }
                            $(document).ready(function () {
                                $.ajax
                                (
                                    {
                                        dataType: 'json',
                                        url:'getBlog',
                                        success:function(data){
                                            $.each(data,function (i,value)
                                            {
                                                var tr =$("<tr/>");
                                                tr.append($("<td/>",
                                                    {
                                                        text : " Title la :" + value.title + " content la : " + value.content
                                                    }))
                                                $('#blogPost').prepend(tr);
                                            })
                                        },
                                       error: function (jqXhr,textStatus,errorMessage)
                                        {
                                            $('#blogPost').append('')
                                        }
                                    })
                                $('#register').submit(function (event)// save blogs
                                {
                                    event.preventDefault();
                                    var bTitle = $('#title').val();
                                    var bContent = $('#content').val();
                                    console.log(bTitle);
                                    $.post('blogs',{ title: bTitle, content : bContent},function (data)
                                    {
                                    })
                                })
                            })
                        </script>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <strong><h5>Your Blogs</h5></strong>
                            </div>
                            <div class="card-body">
                                <div style="padding-top: 30px">
                                    <table  class="table table-responsive table-striped table-hover data-table" style="border-style: solid;border-width: thin">
                                        <tr>
                                            <th>
                                                Blog
                                            </th>
                                            <th>
                                                Tittle
                                            </th>
                                            <th>
                                                Content
                                            </th>
                                            <th>
                                                Author
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Comments
                                            </th>
                                        </tr>
                                        @foreach($blog as $b)
                                            <tr>
                                                <td>
                                                    {{$b->id}}
                                                </td>
                                                <td>
                                                    {{$b->title}}
                                                </td>
                                                <td>
                                                    {{$b->content}}
                                                </td>
                                                <td>
                                                    {{$b->author}}
                                                </td>
                                                <td>
                                                    {{$b->created_at}}
                                                </td>
                                                <td>
                                                    {{$b->commentsCount->count()}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="width: 300px" >
                            <div class="card-header">
                                <strong><h5>Personal Info</h5></strong>
                            </div>
                            <div class="card-body">
                                <h6>{{session('email')}}</h6>
                                <div class="card-text">
                                    <a href="{{action('UserController@edit',$id = session('user_id'))}}" class="card-link" style="margin-left: 1em"> change Password</a>
                                </div>
                                <div>
                                    <a href="{{route('order.show',$id= session('user_id'))}}" class="card-link" style="margin-left: 1em">Your previous order</a>
                                </div>
                                <blockquote class="blockquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">Tam Pham <cite title="Source Title">Source Facebook</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
    </body>
</html>
