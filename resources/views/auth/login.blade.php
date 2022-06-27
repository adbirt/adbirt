<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="/public/assets-revamp/new-auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/public/assets-revamp/new-auth/css/style.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/public/assets-revamp/css/style.css">

</head>

<body>

    <div class="main">

        <h1>Login</h1>
        <div class="container">
            <div class="sign-up-content">
                {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'signup-form']) !!}
                @include('includes.alert')
                <h2 class="form-title">Welcome back</h2>
                <style>
                    input[type="email"] {
                        border: 1px solid
                    }
                </style>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    {!! Form::text('email', '', ['id' => 'email', 'type' => 'email', 'autofocus' => true]) !!}
                </div>

                <div class="form-textbox">
                    <label for="pass">Password</label>
                    {!! Form::password('password', ['id' => 'pass', 'type' => 'password']) !!}
                </div>

                {{-- <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                        statements in <a href="#" class="term-service">Terms of service</a></label>
                </div> --}}

                <div class="form-textbox">
                    {!! Form::submit('Log in', ['class' => 'submit bg-primary-color']) !!}
                </div>
                {!! Form::close() !!}

                <p class="loginhere">
                    Dont have an account ?<a href="/register" class="loginhere-link text-primary-color">Register</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="/public/assets-revamp/new-auth/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets-revamp/new-auth/js/main.js"></script>

</body>

</html>
