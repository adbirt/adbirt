<?php

namespace app\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

	$filePath = "/storage/logs/laravel-2021-02-26.log";

	Log::debug('*** callled kernal');
        $schedule->command('inspire')
                 ->hourly();
	

		$currentDate = date("Y-m-d");
		$campArr = DB::table('advertiserjs')->select('campaign_id')->get();
		//print_r($campArr);
		$arr = array();
		foreach($campArr as $camp){
		  array_push($arr, $camp->campaign_id);
		}
		$campaigns = DB::table('campaigns')->whereIn('campaign_approval_status', ['Approved','Pending'])->whereNotIn('id',[implode(",",$arr)])->get();
		$arrOwner = array();
		//print_r($campaigns);	 

		//delete records if don't have date
		$date = DB::table('advertiserjs')->select('date')->get();
		//print_r($date);
		if($date != null){
		  if($date[0]->date != $currentDate){
		     echo "** before truncate ";	
		     DB::table('advertiserjs')->truncate();
		  }
		}
		
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
			$values = array('campaign_id' => $campaign->id,'campaign_name' => $campaign->campaign_name, 'found'=>$urlFound, 'approve'=>$campaign->campaign_approval_status, 'date' => $currentDate);
			
			//$values = array('campaign_id' =>1,'campaign_name' => 'campaign_name', 'found'=>true, 'approve'=>'campaign_approval_status');
			DB::table('advertiserjs')->insert($values);
		  //break;
		}

    }
}
