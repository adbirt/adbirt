<!DOCTYPE html>
<html lang="en">

@include('includes.header')
{!! Html::style('plugins/iCheck/square/blue.css') !!}
{!! Html::style('tel/build/css/intlTelInput.css') !!}
{!! Html::style('countryselect/css/countrySelect.css') !!}
{!! Html::style('plugins/datepicker/datepicker3.css') !!}
<style>
.iti-flag {background-image: url("tel/build/img/flags.png");}
</style>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Signup</title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

    <!-- Font Awesome -->
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    <!-- Ionicons -->
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en') !!}
    <!-- Theme style -->
    {!! Html::style('dist/css/style.min.css') !!}
   
</head>

<body class="login">

  <div class="row">
    <div class="col-sm-8 col-sm-push-1 col-md-4 col-md-push-3 col-lg-4 col-lg-push-4">
      <div class="center m-a-2">
        <div class="icon-block img-circle">
          <i class="material-icons md-36 text-muted">account_box</i>
        </div>
      </div>
      <div class="card">
        <div class="card-header bg-white center">
          <h4 class="card-title">Sign Up</h4>
          <p class="card-subtitle">Create a new account</p>
		  @include('includes.alert')
        </div>
        <div class="p-a-2">
		{!! Form::open(array('route' => 'user.store', 'method' => 'post', 'id' => 'register')) !!}
          <!-- <form action="https://learnplus.themekit.io/index.html" method="get"> -->
            <div class="form-group">
         {!! Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Full Name')) !!}
		 <!--<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  <input type="text" class="form-control" placeholder="Full Name"> -->
            </div>
			
			 <!-- select how do you want to login  -->
          {{-- <div class="form-group has-feedback">
            How Do You Want to Sign Up ?
                <div>
                  <label class="radio-inline"><input id="email1" type="radio" name="login" value="email">Email</label>
                  <label class="radio-inline"><input id="phone1" type="radio" name="login" value="phone">Phone</label>
                </div>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
          </div> --}}
		  
		   <!-- hidden feild by deafault  -->
        <input id="email1" type="hidden" name="login" value="email">
          <div class="form-group has-feedback" id="inpmail">
            {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address', 'autofocus')) !!}
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
          </div>
	{{-- 	  
		  <div class="form-group has-feedback" id="inpphone" style="display:none;">
            {!! Form::tel('phone','', array('class' => 'form-control','id' => 'tel', 'placeholder' => 'e.g  +2430000000')) !!}
            <!-- <span class="glyphicon glyphicon-phone form-control-feedback"></span> -->
          </div> --}}
          <!-- hidden feild by deafault end -->
          <div class="form-group has-feedback">
            What you want to became?
                <div>
                  <label class="radio-inline"><input id="" type="radio" name="Role" value="vendor">Advertiser</label>
                  <label class="radio-inline"><input id="" type="radio" name="Role" checked value="client">Publisher</label>
                </div>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
          </div>
		  
		   <div class="form-group has-feedback">
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) !!}
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
          </div>

          <div class="form-group has-feedback">

{!! Form::text('birthday', null, array('class' => 'form-control', 'placeholder' => 'Birthday', 'id' => 'birthday', 'data-relmax' => '-18')) !!}
            <!-- <span class="glyphicon glyphicon-calendar form-control-feedback"></span> -->
          </div>

          <div class="form-group has-feedback">
          <!-- <input type="select" id="country"> -->
            {!! Form::text('country','', array('class' => 'form-control', 'id' => 'country')) !!}
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
          </div>

          <div class="form-group has-feedback">
            {!! Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) !!}
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
          </div>

          <div class="form-group has-feedback">
            {!! Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Street No, Area')) !!}
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
          </div>
		  
          <!--  <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirm Password">
            </div> -->
			
		  <div class="form-group has-feedback">
		  <label class="c-input c-checkbox">
            {!! Form::checkbox('agree', 'yes', array('class' => 'form-control form-group')) !!}
           <span class="c-indicator"></span>  I agree to the <a href="terms.html">Terms of Use</a> &amp; <a href="privacy">Privacy Policy</a>
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
			</label>
          </div>
		  
           <!-- <p class="center">
              <button type="submit" class="btn btn-primary btn-rounded btn-block">Sign Up</button>
            </p> -->
			 <div class="form-group">
            {!! Form::submit('Sign Up', array('class' => 'btn btn-primary btn-block btn-rounded', 'type'=>'submit')) !!}
        </div>
		
		{!! Form::close() !!}
		<br />
            <div class="center">Already signed up? <a href="{{ route('login') }}">Log in</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  {!! Html::script('dist/vendor/jquery.min.js') !!}



    {!! Html::script('dist/js/polyfiller.js') !!}
  <!-- <script src="assets/vendor/jquery.min.js"></script> -->

 <script src="https://adbirt.com/public/assets/js/advertiser5.js"></script>	

  <!-- Bootstrap -->
  {!! Html::script('dist/vendor/tether.min.js') !!}
  {!! Html::script('dist/vendor/bootstrap.min.js') !!}
  <!-- <script src="assets/vendor/tether.min.js"></script> 
  <script src="assets/vendor/bootstrap.min.js"></script>-->

  <!-- AdminPlus -->
  {!! Html::script('dist/vendor/adminplus.js') !!}
 <!-- <script src="assets/vendor/adminplus.js"></script> -->

  <!-- App JS -->
  {!! Html::script('dist/js/main.min.js') !!}
  <!-- <script src="assets/js/main.min.js"></script> -->
  
  <!-- js placed at the end of the document so the pages load faster -->

    {!! Html::script('plugins/iCheck/icheck.min.js') !!}
        <!--common script for all pages-->
<!--    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!} -->
    <!-- Bootstrap 3.3.5 -->
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    <!-- FastClick -->
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('dist/js/app.min.js') !!}
    <!-- Sparkline -->
    {!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
    <!-- jvectormap -->
    {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
    {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    <!-- SlimScroll 1.3.0 -->
    {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
    <!-- ChartJS 1.0.1 -->
    {!! Html::script('plugins/chartjs/Chart.min.js') !!}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- {!! Html::script('dist/js/pages/dashboard2.js') !!} -->
    <!-- AdminLTE for demo purposes -->
    {!! Html::script('dist/js/demo.js') !!}

    {!! Html::script('tel/build/js/intlTelInput.js') !!}

    {!! Html::script('countryselect/js/countrySelect.min.js') !!}
    {!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}


    <script>
    if($("#email1").is(':checked')) {
      $('#inpmail').toggle();
    } else if($("#phone1").is(':checked')){
      $('#inpphone').toggle();
    }
      $("#country").countrySelect();

      // $("#tel").intlTelInput({
      //     utilsScript: "tel/build/js/utils.js" // just for formatting/placeholders etc
      // });

      // get the country data from the plugin
    var countryData = $.fn.intlTelInput.getCountryData(),
      telInput = $("#tel"),

      addressDropdown = $("#country");

    // init plugin
    $.each(countryData, function(i, country) {
      country.name = country.name.replace(/.+\((.+)\)/,"$1");
    });
    telInput.intlTelInput({
      utilsScript: "tel/build/js/utils.js",
      autoHideDialCode: false,
      autoPlaceholder: false,// just for formatting/placeholders etc
    });

    // populate the country dropdown
    // $.each(countryData, function(i, country) {
    //   addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
    // });
    // // set it's initial value
    // var initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
    // addressDropdown.val(initialCountry);

    // // listen to the telephone input for changes
    // telInput.on("countrychange", function(e, countryData) {
    //   addressDropdown.val(countryData.iso2);
    // });

    // // listen to the address dropdown for changes
    // addressDropdown.change(function() {
    //   telInput.intlTelInput("setCountry", $(this).val());
    // });

      // select login type 
        // alert("The phone was clicked.");
        // $( this ).after( "<p>The phone was clicked.</p>" );
        // $(#inputmail).html("Hello <b>world!</b>");
    $("#phone1").click(function(){
        $('#inpphone').toggle();
        $('#inpmail').hide();

    });
    $("#email1").click(function(){
        // alert("The email was clicked.");
        $('#inpmail').toggle();
        $('#inpphone').hide();
        // $( this ).after( "<p>The email was clicked.</p>" );
    });

    
          // $("#birthday").datepicker({
          //     format: 'yyyy-mm-dd',
          //     endDate: '+0d',
          //     autoclose: true 
          // });
            // $( "#birthday" ).datepicker( "setDate", new Date() ); 


    </script>
	
<script type="text/javascript">
webshims.setOptions('forms', {
    iVal: {
        sel: '.form-control'
    }
});
//start polyfilling
webshims.polyfill('forms forms-ext');


$(function () {
    $('input[data-relmax]').each(function () {
        var oldVal = $(this).prop('value');
        var relmax = $(this).data('relmax');
        var max = new Date();
        max.setFullYear(max.getFullYear() + relmax);
        $.prop(this, 'max', $(this).prop('valueAsDate', max).val());
        $.prop(this, 'value', oldVal);
    });
     console.log('onload called');	
     $( "#register" ).submit(function( event ) {
	  alert( "Handler for .submit() called." );
	  event.preventDefault();
     });	
});


</script>

<script type="text/javascript">

	$( document ).ready(function() {
	    console.log( "ready!" );
	});

   </script>

</body>


<!-- Mirrored from learnplus.themekit.io/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 20:47:12 GMT -->
</html>
