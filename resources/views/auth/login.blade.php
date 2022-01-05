<!DOCTYPE html>

<html lang="en">





<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{!! $title !!} - {!! Config::get('customConfig.names.siteName')!!}</title>



  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->

  <meta name="robots" content="noindex">

  

    <!-- Font Awesome -->

    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}

    <!-- Ionicons -->

    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en') !!}

    <!-- Theme style -->

    {!! Html::style('dist/css/style.min.css') !!}



  <!-- Material Design Icons  

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  -->

  <!-- Roboto Web Font 

  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

  -->

  <!-- App CSS 

  <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">

-->

</head>



<body class="login">



  <div class="row">

    <div class="col-sm-8 col-sm-push-1 col-md-4 col-md-push-4 col-lg-4 col-lg-push-4">

      <div class="center m-a-2">

        <div class="icon-block img-circle">

          <a href="{{ route('dashboard') }}"><i class="material-icons md-36 text-muted">lock</i></a>

        </div>

      </div>

      <div class="card bg-transparent">

        <div class="card-header bg-white center">

          <h4 class="card-title">Login</h4>

          <p class="card-subtitle">Access your account</p>

      @include('includes.alert')

        </div>

        <div class="p-a-2">

    {!! Form::open(array('route' => 'login', 'method' => 'post')) !!}

         <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

             {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address or Phone Number', 'type'=>'text','autofocus')) !!}

            </div>

            <div class="form-group">

        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password','type'=>'text')) !!}

            </div>

            <div class="form-group ">

      <!-- 360 <div class="checkbox icheck">

                <label>

                  <input type="checkbox" checked="true"> Remember Me

                </label>

              </div> -->

              {!! Form::submit('Log in', array('class' => 'btn btn-primary btn-block btn-rounded', 'type'=>'submit')) !!}

        <br />

            </div>

      {!! Form::close() !!}

            <div class="center">

              <a href="#">

                <a data-toggle="modal" href="#myModal"><small>Forgot Password?</small></a>

              </a>

            </div>

          </form>

        </div>

        <div class="card-footer center bg-white">

          Not yet a User? <a href="{{ route('register') }}" class="text-center">Sign up</a>

        </div>

      </div>

    </div>

  </div>





  <!-- Modal -->

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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





                {!! Form::open(array('route' => 'reset-password', 'method' => 'post')) !!}



                {!! Form::text('email', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email/Phone', 'autocomplete'=>'off')) !!}

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

      {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}

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

      $(function () {

        $('input').iCheck({

          checkboxClass: 'icheckbox_square-blue',

          radioClass: 'iradio_square-blue',

          increaseArea: '20%' // optional

        });

      });

    </script>



</body>



</html>