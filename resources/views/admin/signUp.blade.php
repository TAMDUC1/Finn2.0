<!-- create.blade.php.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{!! asset('js/validate.js') !!}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <title>Finn </title>
    </head>
    <body>
        <nav class="clearfix" style="background-color: #cac8c6" role="navigation">
            <form method="post" action="{{route('logout')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger float-right" >Log out</button>
            </form>
        </nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"> <a href="{{route('profile1')}}">Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Create a new admin
            </li>
        </ol>

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
                        <button type="submit" class="btn btn-warning"  value="Resgister"style="margin-top: 5px;margin-left: 52px">Create</button>
                    </div>
                </form>
            </div>
            <div style="padding-left: 5px " id="formRegister">
                <form action="">
                    <div>
                        <label for="name">Admin:</label>

                        <input  name="field1" class="form-control" type="text"style="border-color: #5bc0de;border-radius: 5px" id="adminName">
                    </div>
                    <div>
                        <label for="name">Email:</label>

                        <input name="filed2" class="form-control" type="text"style="border-color: #5bc0de;border-radius: 5px" id="adminEmail">

                    </div>
                    <div>
                        <label for="name">Pass:</label>

                        <input name="field3" class="form-control" type="text"style="border-color: #5bc0de;border-radius: 5px" id="adminPass">

                    </div>
                    <div style="padding-top: 5px">
                        <button type="submit"class="btn btn-primary" style="padding-left: 15px;margin-left: 20px">Create via Jquery</button>
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

        $(document).ready(function ()
        {
            console.log('abc');
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

            $('#formRegister').submit(function ()
            {
                var aName = $('#name').val();
                var aEmail = $('#email').val();
                var aPassword = $('#password').val();
                var aPhone = $('#phone').val();
                var aAddress = $('#address').val();

                $('#formRegister').validate({
                    rules:{
                        field1:{
                            required: true

                        },
                        field2:{
                            required: true

                        },
                        field3:{
                            required: true

                        }
                    },
                    submitHandler: function (form)
                    { // for demo
                        alert('valid form submitted'); // for demo
                        return false; // for demo
                    }
                });

            });

        })
    </script>
    </body>
</html>


