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

    <!-- Forgot password Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <h4 class="modal-title text-primary-color" id="myModalLabel">Forgot Password?</h4>

                </div>

                <div class="modal-body">

                    {{-- <p>Enter your e-mail/phone below to reset your password.</p> --}}
                    <p>Enter your e-mail below to reset your password.</p>

                    {!! Form::open(['route' => 'reset-password', 'method' => 'post']) !!}

                    {{-- {!! Form::text('email', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email/Phone', 'autocomplete' => 'off']) !!} --}}
                    {!! Form::text('email', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email', 'autocomplete' => 'on', 'style' => 'border: .1px solid var(--theme-color);']) !!}

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cancel</button>

                    {!! Form::submit('Submit', ['class' => 'btn btn-danger bg-primary-color btn-rounded']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>

    {{-- <h1 class="text-primary-color">Login</h1> --}}

    <div class="main">
        <div class="container">
            <div class="sign-up-content">
                {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'signup-form']) !!}
                @include('includes.alert')
                <br />
                <p class="form-title">Welcome Back</p>

                <div class="form-textbox">
                    {{-- <label for="email">Email</label> --}}
                    {!! Form::text('email', '', ['id' => 'email', 'type' => 'email', 'placeholder' => 'Email', 'autofocus' => true]) !!}
                </div>

                <div class="form-textbox">
                    {{-- <label for="pass">Password</label> --}}
                    {!! Form::password('password', ['id' => 'pass', 'type' => 'password', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-textbox">
                    {!! Form::submit('Log in', ['class' => 'submit bg-primary-color']) !!}
                </div>
                {!! Form::close() !!}

                <p class="loginhere">
                    Forgot your password? click <a href="#forgotPasswordModal"
                        class="loginhere-link text-primary-color">here</a>
                    <br />
                    <br />
                    Dont have an account? <a href="/register" class="loginhere-link text-primary-color">Register</a>
                    <br />
                    <br />
                    Or, return to <a href="/" class="loginhere-link text-primary-color">home page</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="/public/assets-revamp/new-auth/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets-revamp/new-auth/js/main.js"></script>

</body>

</html>
