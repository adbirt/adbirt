<?php

namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\userModel;
use App\Profile;
use App\User;
use App\Model\campaign;
use App\Model\rolesModel;
use App\Transaction;
use App\Model\cityModel;
use Illuminate\Support\Facades\Log;
//use App\Job\AdvertiserJs;
use Illuminate\Queue\Capsule\Manager as Queue;
use app\Jobs\AdvertiserJs;

class ownerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrOwner = rolesModel::with('GetOwner')
            ->where('role_id', "2")
            ->get();
        $this->outputData['arrOwner'] = $arrOwner;
        $userAmount = array();
        //get balance of users
        $TotalVendorAmt = 0;
        $VendorAmt[] = null;
        foreach ($arrOwner as $value1) {
            $VendorAmt[] = null;
            //$VendorAmt[] = Transaction::select('amount')->where('user_id',$value1->user_id)->get();    
            $VendorAmt = DB::table('transactions')->where('user_id', $value1->user_id)->get();
            //echo "** user id ".$value1->user_id;	
            //print_r($VendorAmt);
            $TotalVendorAmt = 0;
            if (isset($VendorAmt)) {
                $TotalVendorAmt = 0;
                foreach ($VendorAmt as $value) {
                    if (isset($value->amount) && $value->amount > 0) {
                        $TotalVendorAmt += $value->amount;
                    }
                }
            }
            $userAmount[$value1->user_id] = $TotalVendorAmt;
        }
        $this->outputData['balanceAmount'] = $userAmount;
        //print_r($userAmount);
        return view('owner.view-owner', $this->outputData);
    }

    public function watchjs()
    {

        /*\Artisan::call('schedule:run');
	abcd
	Queuee::push('AdvertiserJs', array('message' => 'executed'));*/

        /*$campaigns = DB::table('campaigns')->whereIn('campaign_approval_status', ['Approved','Pending'])->get();
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
		DB::table('advertiserjs')->insert($values);
		Log::debug('An informational message.');
	  break;
	}
	$this->outputData['arrOwner'] = $arrOwner;
        return view('owner.watchjs',$this->outputData);  
	*/
        $campaigns = DB::table('advertiserjs')->get();
        $this->outputData['arrOwner'] = $campaigns;
        return view('owner.watchjs', $this->outputData);
        //echo "** called schedulerrrr";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {
        //

        $arrCity = cityModel::where('isDeleted', 'No')
            ->orderBy('id', 'desc')
            ->get();

        $this->outputData['arrCity'] = $arrCity;
        return view('owner.add-owner', $this->outputData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = "")
    {
        //
        $input = $request->all();

        if (!empty($id)) {
            $Id = base64_decode($id);
            $arrOwner = User::find($Id);

            $arrCity = cityModel::where('isDeleted', 'No')
                ->orderBy('id', 'desc')
                ->get();

            $this->outputData['ownerData'] = $arrOwner;
            $this->outputData['arrCity'] = $arrCity;
            return view('owner.add-owner', $this->outputData);
        } else {
            if (isset($input['id'])) {
                $input['name'] = strtolower(trim($input['name']));
                $Id = $input['id'];
                unset($input['id']);
                unset($input['_token']);
                if (isset($input['password'])) {
                    $input['password'] = bcrypt($input['password']);
                } else {
                    $input['password'] = $input['oldPass'];
                }
                unset($input['oldPass']);
                unset($input['old_email']);

                userModel::where('id', $Id)->update($input);
                \Session::flash('flash_message', "Advertiser details has been updated successfully");
            } else {

                $owner            = new userModel;
                $owner->name  = strtolower(trim($input['name']));
                $owner->email  = strtolower(trim($input['email']));
                $owner->phone  = trim($input['phone']);
                $owner->address  = strtolower(trim($input['address']));
                $owner->country  = strtolower(trim($input['country']));
                $owner->birthday  = trim($input['birthday']);
                $owner->city  = trim($input['city']);
                $owner->login  = $input['login'];
                $owner->active  = "1";
                $owner->password  = bcrypt($input['password']);
                $owner->save();
                $id = $owner->id;

                \Session::flash('flash_message', "Advertiser has been added successfully");

                $role = new rolesModel;
                $role->user_id = $id;
                $role->role_id = "2";
                $role->save();

                $Trans = new Transaction;
                $Trans->user_id = $id;
                $Trans->amount = "0";
                $Trans->method_id = "1";
                $Trans->save();

                $Pro = new Profile;
                $Pro->user_id = $id;
                $Pro->propic = "http://lorempixel.com/640/480/?83341";
                $Pro->save();
            }
            return redirect('/advertiser/view-advertiser');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CheckEmail(Request $request)
    {
        //
        $input = $request->all();
        if (isset($input['action']) && $input['action'] == 'edit') {
            if (strtolower($input['old_email']) === strtolower($input['email'])) {
                echo "true";
                die;
            } else {
                $arrUser = userModel::where('email', $input['email'])
                    ->count();
                if ($arrUser == 1) {
                    echo "false";
                    die;
                } else {
                    echo "true";
                    die;
                }
            }
        } else {
            $arrUser = userModel::where('email', $input['email'])
                ->count();
            if ($arrUser == 1) {
                echo "false";
                die;
            } else {
                echo "true";
                die;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function CheckPhone(Request $request)
    {
        //
        $input = $request->all();

        $UserDet = count(userModel::select('id')->where('phone', 'LIKE', '%' . $input['phone'])->get());
        if ($UserDet == 0) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CheckAcc()
    {
        $Adverts = rolesModel::with('GetOwner')
            ->where('role_id', "2")
            ->get();
        $AdvertsId = array();
        foreach ($Adverts as $key => $value) {
            $AdvertsId[] = $value->user_id;
        }
        if (!empty($AdvertsId)) {
            foreach ($AdvertsId as $key => $value) {
                $balance = Transaction::where('user_id', $value)->first();

                if (!empty($balance)) {
                    if ($balance->amount > 0) {
                        $status['isActive'] = "Active";
                    } else {
                        $status['isActive'] = "InActive";
                    }
                    campaign::where('advertiser_id', $value)->update($status);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $input = $request->all();
        $Id = $input['id'];
        $del['active'] = '0';
        User::where('id', $Id)->update($del);
        rolesModel::where('user_id', $Id)->delete();
        Profile::where('user_id', $Id)->delete();
        Transaction::where('user_id', $Id)->delete();
        \Session::flash('flash_message', "Advertiser details has been deleted successfully");
        echo "true";
        die;
    }
}
