<!DOCTYPE html>
<html lang="en">
@include('includes.header')
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Account Activation</title>

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
          <a href="{{ route('dashboard') }}"><i class="material-icons md-36 text-muted">contact_mail</i></a>
        </div>
      </div>
      <div class="card bg-transparent">
        <div class="card-header bg-white center">
          <h4 class="card-title">Activation</h4>
          <p class="card-subtitle">Activate your account</p>
		  @include('includes.alert')

        @if($login_type == 2 )
        {!! Form::open(array('route' => 'user.doactivate', 'method' => 'get')) !!}

          <div class="form-group has-feedback">
          {!! Form::label('phone', 'Phone Number') !!}
          {!! Form::text('phone', $phone , array('class' => 'form-control', 'placeholder' => 'Your Phone Number')) !!}
          </div>

          <div class="form-group has-feedback">
          {!! Form::label('key', 'Activation Key') !!}
          {!! Form::text('key','', array('class' => 'form-control', 'placeholder' => 'Provide the Activation key sent to your mobile')) !!}
          </div>

          <!-- provide acvtivation key   -->

        <div class="form-group">
            {!! Form::submit('Proceed', array('class' => 'btn btn-primary btn-block btn-flat')) !!}
        </div>

        {!! Form::close() !!}
        @else
          <!-- <h4>An email has been sent to your email address. Please, follow the instructions
          </h4> -->
        @endif
        <a href="{{ route('login') }}" class="text-center">Go to Login Section</a>



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
   {!! Html::script('dist/jsj/main.min.js') !!}
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