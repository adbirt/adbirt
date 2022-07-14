<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Font Awesome -->
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}

    <!-- Ionicons -->
    {!! Html::style(
        'https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en',
    ) !!}

    <!-- Theme style -->
    {!! Html::style('dist/css/style.min.css') !!}

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="/public/assets-revamp/new-auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/public/assets-revamp/new-auth/css/style.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/public/assets-revamp/css/style.css">

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        window.submitRegistrationForm = function submitRegistrationForm(token) {
            document.getElementById("#adbirt-form").submit();
        }
    </script>

</head>

<body>

    <!-- Forgot password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                    {!! Form::open(['route' => 'reset-password', 'method' => 'post', 'id' => 'adbirt-form']) !!}

                    {{-- {!! Form::text('email', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email/Phone', 'autocomplete' => 'off']) !!} --}}
                    {!! Form::text('email', '', [
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'Email',
                        'autocomplete' => 'on',
                        'style' => 'border: .1px solid var(--theme-color);',
                    ]) !!}

                </div>

                <div class="modal-footer">

                    <div class="d-flex flex-row align-items-center-justify-content-between">

                        <button type="button" class="btn btn-danger btn-rounded omitted-input"
                            data-dismiss="modal">Cancel</button>

                        {!! Form::submit('Submit', ['class' => 'btn btn-danger bg-primary-color btn-rounded omitted-input']) !!}

                    </div>

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
                <p class="form-title">Welcome Back</p>
                <br />

                <div class="form-textbox">
                    {{-- <label for="email">Email</label> --}}
                    {!! Form::text('email', '', ['id' => 'email', 'type' => 'email', 'placeholder' => 'Email', 'autofocus' => true]) !!}
                </div>

                <div class="form-textbox">
                    {{-- <label for="pass">Password</label> --}}
                    {!! Form::password('password', ['id' => 'pass', 'type' => 'password', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-textbox">
                    {!! Form::submit('Log in', [
                        'class' => 'submit bg-primary-color g-recaptcha',
                        'data-sitekey' => 'reCAPTCHA_site_key',
                        'data-callback' => 'submitRegistrationForm',
                        'data-action' => 'submit',
                    ]) !!}
                </div>
                {!! Form::close() !!}

                <p class="loginhere">
                    Forgot your password? click <a data-toggle="modal" href="#forgotPasswordModal"
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

    <!-- jQuery -->
    {!! Html::script('dist/vendor/jquery.min.js') !!}
    <script src="assets/vendor/jquery.min.js"></script>
    <!-- Bootstrap -->
    {!! Html::script('dist/vendor/tether.min.js') !!}
    {!! Html::script('dist/vendor/bootstrap.min.js') !!}
    <script src="assets/vendor/tether.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>
    <!-- AdminPlus -->
    {!! Html::script('dist/vendor/adminplus.js') !!}
    <script src="assets/vendor/adminplus.js"></script>
    <!-- App JS -->
    {!! Html::script('dist/js/main.min.js') !!}
    <script src="assets/js/main.min.js"></script>
    <!-- Vendor JS -->
    {!! Html::script('dist/vendor/sweetalert.min.js') !!}
    <!-- Initialize -->
    {!! Html::script('examples/js/sweetalert.js') !!}


</body>

</html>
