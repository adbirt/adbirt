<html>
<head>
<meta charset="utf-8"/>
@if( isset($campaignData) && !empty($campaignData))
<meta property="og:url"           content="https://adbirt.com/campaigns/share/{{$id}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{!! ucwords($campaignData->campaign_name) !!}" />
  <meta property="og:description"   content="{!! ucwords(strip_tags($campaignData->campaign_description))  !!}" />
  <meta property="og:image"         content="{{ asset('/uploads/campaign_banners/'.$campaignData->campaign_banner)}}" />
@endif
<link href="https://adbirt.com/public/assets/css/ubm.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://adbirt.com/public/assets/js/ubm-jsonp.js?ver=2.50"></script>
</head>
<body style="display:none;">
 
<br/>

<script>
    jQuery( document ).ready(function() {
        //setTimeout(function(){ window.location.href = "https://www.adbirt.com/ubm_banner_click/{{$id}}"; };, 2000);
	window.location.href = "https://www.adbirt.com/campaigns/inccampview/{{$id}}";
    });
</script>

   <!--<a class="ubm-banner" data-id="bWg0MGR3OXA3Nw=="></a>
   <a id="ubm-banner-link" class="ubm-banner" data-id="{{$id}}"></a> -->  
   <a id="ubm-banner-link" class="ubm-banner" data-id="test data"></a>	
</body>
</html>

