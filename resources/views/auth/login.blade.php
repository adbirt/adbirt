<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! $title !!} - {!! Config::get('customConfig.names.siteName') !!}</title>

    <!-- Font Awesome -->
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}

    <!-- Ionicons -->
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en') !!}

    <!-- Theme style -->
    {!! Html::style('dist/css/style.min.css') !!}

    <!-- Style CSS -->
    <link rel="stylesheet" href="public/assets-revamp/css/style.css">

</head>

<body class="login">
    <div class="row">

        <div class="col-sm-8 col-sm-push-1 col-md-4 col-md-push-4 col-lg-4 col-lg-push-4">

            <div class="center m-a-2">
                <div class="icon-block img-circle" style="border: 1px solid var(--theme-color)">
                    <a href="{{ route('dashboard') }}">
                        <i class="material-icons md-36 text-muted text-primary-color">lock</i>
                    </a>
                </div>
            </div>

            <div class="card bg-transparent shadow shadow-lg" style="border: 1px solid var(--theme-color)">

                <div class="card-header bg-white center">

                    <h4 class="card-title">Login</h4>

                    <p class="card-subtitle">Access your account</p>

                    @include('includes.alert')

                </div>

                <div class="p-a-2">

                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">

                        {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address or Phone Number', 'type' => 'text', 'autofocus']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'text']) !!}

                    </div>

                    <div class="form-group ">

                        {!! Form::submit('Log in', ['class' => 'btn btn-danger bg-primary-color btn-block btn-rounded', 'type' => 'submit']) !!}

                        <br />

                    </div>

                    {!! Form::close() !!}

                    <div class="center">

                        {{-- <a href="#">

                            <a data-toggle="modal" href="#myModal"><small>Forgot Password?</small></a>

                        </a> --}}

                    </div>

                    </form>

                </div>

                <div class="card-footer center bg-white">
                    <p>Not yet a User? <a href="{{ route('register') }}" class="text-center">Sign up</a></p>
                    <p>Or, return to <a href="/">Home Page</a></p>
                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <h4 class="modal-title" id="myModalLabel">Forgot Password ?</h4>

                </div>

                <div class="modal-body">

                    <p>Enter your e-mail/phone below to reset your password.</p>





                    {!! Form::open(['route' => 'reset-password', 'method' => 'post']) !!}



                    {!! Form::text('email', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email/Phone', 'autocomplete' => 'off']) !!}

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>





    <!-- jQuery -->

    {!! Html::script('dist/vendor/jquery.min.js') !!}

    <!-- <script src="assets/vendor/jquery.min.js"></script> -->



    <!-- Bootstrap -->

    {!! Html::script('dist/vendor/tether.min.js') !!}

    {!! Html::script('dist/vendor/bootstrap.min.js') !!}

    <!-- <script src="assets/vendor/tether.min.js"></script>

  <script src="assets/vendor/bootstrap.min.js"></script> -->



    <!-- AdminPlus -->

    {!! Html::script('dist/vendor/adminplus.js') !!}

    <!-- <script src="assets/vendor/adminplus.js"></script> -->



    <!-- App JS -->

    {!! Html::script('dist/js/main.min.js') !!}

    <!-- <script src="assets/js/main.min.js"></script> -->







    <!-- Vendor JS -->

    {!! Html::script('dist/vendor/sweetalert.min.js') !!}

    <!-- <script src="assets/vendor/sweetalert.min.js"></script> -->



    <!-- Initialize -->

    {!! Html::script('examples/js/sweetalert.js') !!}

    <!-- <script src="examples/js/sweetalert.js"></script> -->



    <!-- iCheck -->

    {!! Html::script('plugins/iCheck/icheck.min.js') !!}

    <script>
        $(function() {

            $('input').iCheck({

                checkboxClass: 'icheckbox_square-blue',

                radioClass: 'iradio_square-blue',

                increaseArea: '20%' // optional

            });

        });
    </script>



</body>



</html>
