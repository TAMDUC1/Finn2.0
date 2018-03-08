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
        <nav class="clearfix" style="background-color: #8b8987" role="navigation">
            <form method="post" action="{{action('UserController@logout')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger float-right" style="margin:1px ">Log out</button>
            </form>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Profile
                </li>
            </ol>
            <div class="text-info">
                <h6>{{session('email')}}</h6>
            </div>
            <div>
                <a href="{{action('UserController@edit',$id = session('user_id'))}}" class="btn" style="margin-left: 1em"> change Password</a>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
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
                                    </div>
                                    <div>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="content"
                                            id="content"
                                            style="height:200px;font-size:14pt;border-color: #1c679c">
                                        </input>
                                    </div>
                                </div>
                                <div class="submit-button">
                                    <button type="submit" class="btn btn-warning " id="sm" ONCLICK="myFunction()">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div id="blogPost"></div>
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
                                        $('#blogPost').append('Error')
                                    }
                                })
                            $('#register').submit(function (event)// save blogs
                            {


                                event.preventDefault();
                                var bTitle = $('#title').val();
                                var bContent = $('#content').val();

                                $.post('blogs',{ title: bTitle, content : bContent},function (data)
                                {
                                    console.log(data);
                                    console.log(data.content);
                                    console.log(data.title);
                                })
                            })
                        })
                    </script>
                </div>
                <div class="col-md-4">
                    <table  class="table table-striped table table-hover data-table">
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
                                    <a href="{{route('blogs.show',['id'=> $b->id])}}" class="btn btn-primary pull-right">{{$b->commentsCount->first()->aggregate}} Comment</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-4 text-info">

                </div>
            </div>

        </div>
        <div class="footer"></div>
    </body>
</html>
