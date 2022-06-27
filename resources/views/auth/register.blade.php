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

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                {!! Form::open(['route' => 'user.store', 'method' => 'post', 'id' => 'register', 'class' => 'signup-form']) !!}
                @include('includes.alert')
                <h2 class="form-title">What do you want to become ?</h2>
                <div class="form-radio">
                    <input type="radio" name="member_level" value="newbie" id="newbie" checked="checked" />
                    <label for="newbie">Advertiser</label>

                    <input type="radio" name="member_level" value="average" id="average" />
                    <label for="average">Publisher</label>


                </div>
                <style>
                    input[type="email"] {
                        border: 1px solid
                    }
                </style>

                <div class="form-textbox">
                    <label for="name">Full name</label>
                    <input type="text" name="name" id="name" />
                </div>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>

                <div class="form-textbox">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" />
                </div>



                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in
                        <a href="#" class="term-service">Terms of service</a></label>
                </div>

                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                </div>
                {!! Form::close() !!}

                <p class="loginhere">
                    Already have an account ?<a href="/login" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="/public/assets-revamp/new-auth/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets-revamp/new-auth/js/main.js"></script>

</body>

</html>
