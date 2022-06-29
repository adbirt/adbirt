<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="/public/assets-revamp/new-auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/public/assets-revamp/new-auth/css/style.css">

    {!! Html::style('countryselect/css/countrySelect.css') !!}

    <style>
        .iti-flag {
            background-image: url("/public/countryselect/img/flags.png");
        }
    </style>

    <!-- Style CSS -->
    <link rel="stylesheet" href="/public/assets-revamp/css/style.css">

</head>

<body>

    {{-- <h1 class="text-primary-color">Sign up</h1> --}}

    <div class="main">

        <div class="container">
            <div class="sign-up-content">
                {!! Form::open(['route' => 'user.store', 'method' => 'post', 'id' => 'register', 'class' => 'signup-form']) !!}
                @include('includes.alert')
                <p class="form-title">What do you want to become?</p>
                <br />
                <div class="form-radio">
                    <label>
                        {!! Form::radio('Role', 'vendor', true) !!}
                        <span for="vendor" class="account-type-checkbox checkbox-label">
                            Advertiser
                        </span>
                    </label>

                    <label>
                        {!! Form::radio('Role', 'client') !!}
                        <span for="client" class="account-type-checkbox checkbox-label">
                            Publisher
                        </span>
                    </label>
                </div>

                <input id="email1" type="hidden" name="login" value="email">

                <div class="form-textbox">
                    <label for="name">Full name</label>
                    {!! Form::text('name', '', ['id' => 'name']) !!}
                </div>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    {!! Form::text('email', '', ['type' => 'email', 'id' => 'email', 'autofocus' => true]) !!}
                </div>

                <div class="form-textbox">
                    <label for="tel">Phone</label>
                    {!! Form::tel('phone', '', ['id' => 'tel']) !!}
                </div>

                <div class="form-textbox">
                    <label for="country">Country</label>
                    {!! Form::text('country', '', ['id' => 'country']) !!}
                </div>

                <div class="form-textbox">
                    <label for="city">City</label>
                    {!! Form::text('city', '', ['id' => 'city']) !!}
                </div>

                <div class="form-textbox">
                    <label for="pass">Password</label>
                    {!! Form::password('password', ['id' => 'pass']) !!}
                </div>

                <div class="form-textbox">
                    <label for="password_confirmation">Confirm Password</label>
                    {!! Form::password('password_confirmation', ['id' => 'password_confirmation']) !!}
                </div>

                <div class="form-group checkbox-container">
                    {!! Form::checkbox('agree', 'yes', ['class' => 'form-control form-group']) !!}
                    <label for="agree-term" class="label-agree-term">
                        {{--  --}}
                        <span>
                            <span>
                                {{--  --}}
                            </span>
                        </span>
                        {{--  --}}
                        I agree all statements in
                        <a href="/terms" class="text-primary-color" target="_blank">Terms of service</a> and <a
                            href="/privacy" class="text-primary-color" target="_blank">privacy policy</a>
                    </label>
                </div>

                <div class="form-textbox">
                    {!! Form::submit('Create account', ['class' => 'submit bg-primary-color']) !!}
                </div>
                {!! Form::close() !!}

                <p class="loginhere">
                    Already have an account?<a href="/login" class="text-primary-color"> Log in</a>
                    <br />
                    <br />
                    Or, return to <a href="/" class="loginhere-link text-primary-color">home page</a>
                </p>
            </div>
        </div>

    </div>

    {{-- {{ $countries }} --}}

    <!-- JS -->
    <script src="/public/assets-revamp/new-auth/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets-revamp/new-auth/js/main.js"></script>

    {!! Html::script('dist/vendor/tether.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('tel/build/js/intlTelInput.js') !!}

    {!! Html::script('countryselect/js/countrySelect.min.js') !!}

    <script>
        $("#country").countrySelect();
    </script>

</body>

</html>
