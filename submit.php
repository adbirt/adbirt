<html>

<head>
    <meta charset="utf-8" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://adbirt.com/public/assets/js/advertiser5.js"></script>
</head>

<body>
    <form class="theFormClass" id="theForm" method="post" action="thankyou.php">
        First Name: <input type="text" name="firstname" required><br />
        Last Name: <input type="text" name="lastname" required><br />
        email: <input type="text" id="email" name="email" required><br />
        Password: <input type="password" name="password" required><br />
        <input type="submit" value="Submit">
    </form>
    <!--
Link test

<a href="https://google.com" id="linkid" class="linkclass">Google</a> -->
</body>
<!--
<script type="text/javascript">
$("#theForm").submit(function(e) {
	
	e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = "thankyou.php";

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
               $.ajax({     
	      		     type: "POST",
	      		     url: 'https://adbirt.com/campaigns/verified',
	      		     data: {
	      					campaign_code: "<?php echo $_REQUEST['camp_code']; ?>",
	      					uniq_id: $("#email").val()
	      				},
	      		     success: function (data) {
	      			     alert(JSON.stringify(data) );
	      		     },
	      		     dataType: "json"
	      		 });	
           }
         });
    return false;
});

</script>
-->

</html>