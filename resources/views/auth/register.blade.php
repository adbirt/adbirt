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

    <!-- Style CSS -->
    <link rel="stylesheet" href="/public/assets-revamp/css/style.css">

</head>

<body>

    <h1 class="text-primary-color">Sign up</h1>

    <div class="main">

        <div class="container">
            <div class="sign-up-content">
                {!! Form::open(['route' => 'user.store', 'method' => 'post', 'id' => 'register', 'class' => 'signup-form']) !!}
                @include('includes.alert')
                <h2 class="form-title">What do you want to become ?</h2>
                <div class="form-radio">
                    <label for="vendor" class="account-type-checkbox">
                        Advertiser
                        {!! Form::radio('Role', 'vendor', ['id' => 'vendor']) !!}
                    </label>

                    <label for="client" class="account-type-checkbox">
                        Publisher
                        {!! Form::radio('Role', 'client', ['id' => 'client']) !!}
                    </label>

                </div>
                <style>
                    input[type="email"] {
                        border: 1px solid
                    }
                </style>

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
                    <label for="pass">Password</label>
                    {!! Form::password('password', ['id' => 'pass']) !!}
                </div>

                <div class="form-textbox">
                    <label for="password_confirmation">Confirm Password</label>
                    {!! Form::password('password_confirmation', ['id' => 'password_confirmation']) !!}
                </div>

                <div class="form-textbox">
                    <label for="country">Country</label>
                    {!! Form::text('country', ['id' => 'country']) !!}
                </div>

                <div class="form-textbox">
                    <label for="city">City</label>
                    {!! Form::text('city', ['id' => 'city']) !!}
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term">
                        <span><span></span></span>
                        {!! Form::checkbox('agree', 'yes', ['class' => 'form-control form-group']) !!}
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
