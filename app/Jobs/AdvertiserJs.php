<?php

namespace app\Jobs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class AdvertiserJs {

    public function fire($job, $data){
       Log::debug('*** callled fire');

            $campaigns = DB::table('campaigns')->whereIn('campaign_approval_status', ['Approved','Pending'])->get();
		$arrOwner = array();	
		foreach($campaigns as $campaign){
		   //print_r($campaign->campaign_url);
		   $urlFound = false;	
		   $testURL = $campaign->campaign_url;
			libxml_use_internal_errors(true);	
			$doc = new \DOMDocument();
			@$doc->loadHTMLFile($testURL);
			$scripts = $doc->getElementsByTagName('script');
				for ($i = 0; $i < $scripts->length; $i++)
				{
				    $script = $scripts->item($i);
				    //echo $i . ": " . $script->getAttribute('src') . "<br />";
				    if($script->getAttribute('src') == 'https://adbirt.com/public/assets/js/advertiser.js'){
				      $urlFound = true;
				      break;
				    }
				}
			//echo " **url found ". $urlFound;
			$arr = array();
			$arr['campaign'] = $campaign;
			$arr['urlFound'] = $urlFound;
			$arrOwner[$campaign->id] = $arr;

			//insert data into table 
			$values = array('campaign_id' => $campaign->id,'campaign_name' => $campaign->campaign_name, 'found'=>$urlFound, 'approve'=>$campaign->campaign_approval_status);
			
			//$values = array('campaign_id' =>1,'campaign_name' => 'campaign_name', 'found'=>true, 'approve'=>'campaign_approval_status');
			DB::table('advertiserjs')->insert($values);
		  break;
		}
    }

}

?>
