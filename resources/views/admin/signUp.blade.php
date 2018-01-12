<!-- create.blade.php.php -->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <title>Finn </title>
</head>
<body>
    <nav class="navbar"style="background-color: #cac8c6" role="navigation">
        <a href="{{route('profile1')}}">Profile</a>
    </nav>
    <div class="flex-center position-ref full-height">
        <div>
            <form method="post" action="{{url('admins')}}" id="register" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{csrf_field()}}
                <div>
                    <div style="border-color: #5bc0de">
                        <label for="name">Admin:</label>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="name" id="name" style="border-color: #5bc0de;border-radius: 5px"/>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="email" id="email" style="border-color: #5bc0de;border-radius: 5px"/>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="password">Password</label>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" id="password" style="border-color: #5bc0de;border-radius: 5px"/>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-warning"  value="Resgister"style="margin-top: 5px;margin-left: 52px">Submit</button>
                </div>
            </form>
        </div>
        <div>
            <div class="fail">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                    <br />
                @endif
            </div>
        </div>
    </div>
<div class=" footer"style="background-color: #efefef">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, rem, vitae? Accusamus blanditiis ducimus eum hic id natus odit quisquam sint tempora voluptate? Ad, adipisci alias amet autem consequuntur cupiditate, distinctio dolores, doloribus eligendi explicabo harum hic impedit ipsum maxime nemo nisi nulla odio omnis placeat quae quibusdam sunt veniam.
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function ()
    {
        $('#register').submit(function ()
        {
            var aName = $('#name').val();
            var aEmail = $('#email').val();
            var aPassword = $('#password').val();
            var aPhone = $('#phone').val();
            var aAddress = $('#address').val();
            $.post('users',{name: aName,mail: aEmail, password: aPassword, phone: aPhone, address: aAddress }, function()
            {
                console.log(data);
                $('#postRequestData').html(data);
            });
        });
    })
</script>
</body>
</html>


