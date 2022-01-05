@extends('layouts.default')
@section('content')

{!! Html::style('plugins/iCheck/square/blue.css') !!}
{!! Html::style('tel/build/css/intlTelInput.css') !!}
{!! Html::style('countryselect/css/countrySelect.css') !!}
{!! Html::style('plugins/datepicker/datepicker3.css') !!}
<style>
.iti-flag {background-image: url("tel/build/img/flags.png");}
</style>
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    <!-- Ionicons -->
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en') !!}
    <!-- Theme style -->
    {!! Html::style('dist/css/style.min.css') !!}
  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">
@include('includes.alert')
      <ol class="breadcrumb">
        <li><a href="{{ route('profile') }}">My Profile</a></li>
        <li class="{!! Menu::isActiveURL('edit-profile') !!}">{{ $title }}</li>
      </ol>

      <div class="card">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="{!! Menu::isActiveURL('edit-profile') !!}" data-toggle="tab">Account</a>
          </li>
        </ul>
        <div class="p-a-2 tab-content">
          <div class="tab-pane active" id="first">
             {!! Form::open(array('route' => 'post.edit.photo', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true)) !!}
              <div class="form-group row">
                <label for="avatar" class="col-sm-3 form-control-label">Avatar</label>
                <div class="col-sm-9">
                  <div class="media">
                    <div class="media-left">
                      <div class="icon-block">
                        <i class="material-icons text-muted-light md-36">photo</i>
                      </div>
                    </div>
                    <div class="media-body media-middle">
                      <label class="file">
                         <input type="file" name="propic" class="form-control" id="inputPhoto">
                        <span class="file-custom"></span>
                      </label>
                    </div>
					<div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Confirm</button>
                              </div>
                            </div>
                  </div>
                </div>
              </div>
			  {!! Form::close() !!}
              <div class="form-group row">
			  {!! Form::model($user, array('route' => 'post.edit.profile', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                 {!! Form::label('name', "Full Name", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-md-9">
                      {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Your Full Name', 'required' => 'required')) !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                 {!! Form::label('email', "Email Address", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
								<i class="material-icons md-18 text-muted">mail</i>
							</span>
                   {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => '', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  <div class="form-group row">
                 {!! Form::label('phone', "Phone Number", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
								<i class="material-icons md-18 text-muted">mail</i>
							</span>
                  {!! Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'e.g. +8801711223344', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  
			  
			  <div class="form-group row">
                {!! Form::label('gender', "Gender", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                    {!! Form::select('gender', $gender, array('class' => 'c-select form-control', 'id' => '', 'required' => 'required')) !!}
                </div>
              </div>
			  
			  	
              <div class="form-group row">
               {!! Form::label('birthday', "Birthday", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>

                    {!! Form::text('birthday', null, array('class' => 'datepicker form-control', 'placeholder' => '01/28/2016','id' => 'birthday', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			                <div class="form-group row">
               {!! Form::label('address', "Address", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Street No., Area...','id' => 'address', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  			                <div class="form-group row">
              {!! Form::label('city', "City", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('city', $user->profile->city, array('class' => 'form-control', 'placeholder' => 'City', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
              {!! Form::label('profession', "Profession", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('profession', $user->profile->profession, array('class' => 'form-control', 'placeholder' => 'Profession', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  
			   <div class="form-group row">
             {!! Form::label('state', "State", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('state', $user->profile->state,  array('class' => 'form-control', 'placeholder' => 'State', 'required' => 'required')) !!}
                  </div>
                </div>
              </div>
			  
			  
			  <div class="form-group row">
                {!! Form::label('country', "Country", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-md-6">
					 {!! Form::text('country', null, array('class' => 'form-control', 'placeholder' => 'Country','id' => '')) !!}
                     
                    </div>
                  </div>
                </div>
              </div>
			  
			   
			  
				
			  			   <div class="form-group row">
              {!! Form::label('aboutmyself', "About Me", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                   {!! Form::textarea('aboutmyself', Auth::user()->profile->aboutmyself, array('class' => 'form-control', 'rows' => 4, 'placeholder' => 'About Yourself')) !!}
                  </div>
                </div>
              </div>
			  
			 <!--    <div class="form-group row">
             {!! Form::label('fb', "Facebook Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                   {!! Form::text('fb', $user->profile->fb, array('class' => 'form-control', 'placeholder' => 'https://facebook.com/username')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
             {!! Form::label('twitter', "Twitter Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                   {!! Form::text('twitter', $user->profile->twitter, array('class' => 'form-control', 'placeholder' => 'https://twitter.com/username')) !!}
                  </div>
                </div>
              </div>
			  
			  			  <div class="form-group row">
            {!! Form::label('gp', "Google+ Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                   {!! Form::text('gp', $user->profile->gp, array('class' => 'form-control', 'placeholder' => 'https://plus.google.com/+username')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
           {!! Form::label('personal_site', "Personal Site", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('personal_site', $user->profile->personal_site, array('class' => 'form-control', 'placeholder' => 'http://www.mywebsite.me')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
           {!! Form::label('aboutme', "About.me", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('aboutme', $user->profile->aboutme, array('class' => 'form-control', 'placeholder' => 'http://www.about.me/name')) !!}
                  </div>
                </div>
              </div>
			  
			   <div class="form-group row">
          {!! Form::label('instagram', "Instagram Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('instagram', $user->profile->instagram, array('class' => 'form-control', 'placeholder' => 'https://www.instagram.com/username')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
         {!! Form::label('linkedin', "LinkedIn Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('linkedin', $user->profile->linkedin, array('class' => 'form-control', 'placeholder' => 'https://www.linkedin.com/username')) !!}
                  </div>
                </div>
              </div>
			  
			  <div class="form-group row">
          {!! Form::label('pinterest', "Pinterest Link", array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    {!! Form::text('pinterest', $user->profile->pinterest, array('class' => 'form-control', 'placeholder' => 'https://www.pinterest.com/username')) !!}
                  </div>
                </div>
              </div> -->
			  
             <!-- <div class="form-group row">
                <label for="password" class="col-sm-3 form-control-label">Change Password</label>
                <div class="col-sm-6 col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
								<i class="material-icons md-18 text-muted">lock</i>
							</span>
                    <input type="text" class="form-control" placeholder="Enter new password">
                  </div>
                </div>
              </div> -->
              <div class="form-group row">
                <div class="col-sm-8 col-sm-offset-3">
                  <div class="media">
                    <div class="media-left">
                     {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
                    </div>
                   <!-- <div class="media-body media-middle p-l-1">
                      <label class="c-input c-checkbox">
                        <input type="checkbox" checked>
                        <span class="c-indicator"></span> Subscribe to Newsletter
                      </label>
                    </div> -->
                  </div>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  

  <!-- <script src="assets/js/main.min.js"></script> -->
  
  <!-- js placed at the end of the document so the pages load faster -->

    {!! Html::script('plugins/iCheck/icheck.min.js') !!}
        <!--common script for all pages-->
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
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
    {!! Html::script('dist/js/pages/dashboard2.js') !!}
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
    $("#phone1").click(function(){
        // alert("The phone was clicked.");
        // $( this ).after( "<p>The phone was clicked.</p>" );
        // $(#inputmail).html("Hello <b>world!</b>");
        $('#inpphone').toggle();
        $('#inpmail').hide();

    });
    $("#email1").click(function(){
        // alert("The email was clicked.");
        $('#inpmail').toggle();
        $('#inpphone').hide();
        // $( this ).after( "<p>The email was clicked.</p>" );
    });

    
          $("#birthday").datepicker({
              format: 'yyyy-mm-dd',
              endDate: '+0d',
              autoclose: true 
          });
            // $( "#birthday" ).datepicker( "setDate", new Date() ); 


    </script>
	
@section('style')

  {!! Html::style('plugins/datepicker/datepicker3.css') !!}
  {!! Html::style('dist/css/flags.css') !!}

@endsection

@section('script')

  {!! Html::script('dist/js/jquery.flagstrap.js') !!}\
  {!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}

  <script type="text/javascript">
    $('#basic').flagStrap();

    $("#birthday").datepicker({
          format: 'yyyy-mm-dd',
          endDate: '+0d',
          autoclose: true 
    });

  </script>

