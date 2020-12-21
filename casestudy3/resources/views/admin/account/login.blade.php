<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /*author:starttemplate*/
        /*reference site : starttemplate.com*/
        body {
            background-image: url('https://i.redd.it/o8dlfk93azs31.jpg');
            background-position: center;
            background-size: cover;

            -webkit-font-smoothing: antialiased;
            font: normal 14px Roboto, arial, sans-serif;
            font-family: 'Dancing Script', cursive !important;
        }

        .container {
            padding: 110px;
        }

        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #ffffff !important;
            opacity: 1; /* Firefox */
            font-size: 18px !important;
        }

        .form-login {
            background-color: rgba(0, 0, 0, 0.55);
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 15px;
            border-color: #d2d2d2;
            border-width: 5px;
            color: white;
            box-shadow: 0 1px 0 #cfcfcf;
        }

        .form-control {
            background: transparent !important;
            color: white !important;
            font-size: 18px !important;
        }

        h1 {
            color: white !important;
        }

        h4 {
            border: 0 solid #fff;
            border-bottom-width: 1px;
            padding-bottom: 10px;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
        }

        .text-white {
            color: white !important;
        }

        .wrapper {
            text-align: center;
        }

        .footer p {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Unique Login Form</h1>
            <div class="form-login"></br>
                <form action="{{route('auth.login')}}" method="post">
                    @csrf
                    <h4 class="mb-4">Secure Login</h4>
                    @if(Session::has('login-error'))
                    <div class="alert alert-danger">{{Session::get('login-error')}}</div>
                        @endif
                    <input type="text" name="username" id="userName" class="form-control input-sm chat-input" placeholder="username"/>
                    </br></br>
                    <input type="password" name="password" id="userPassword" class="form-control input-sm chat-input"
                           placeholder="password"/>
                    </br></br>
                    <div class="wrapper">
                        <span class="group-btn">
                            <button type="submit" class="btn btn-danger btn-md">Login<i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </br></br></br>
    <!--footer-->
    <div class="footer text-white text-center">
        <p>© 2020 Unique Login Form. All rights reserved | Design by <a href="https://freecss.tech">Free Css</a></p>
    </div>
    <!--//footer-->
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
