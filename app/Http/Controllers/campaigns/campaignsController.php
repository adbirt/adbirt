<?php

namespace App\Http\Controllers\campaigns;

use App\Classes\SocialMedia;
use App\Http\Controllers\Controller;
// use App\Http\Requests;
use App\Model\campaign;
use App\Model\campaignorders;
use App\Model\category;
use App\Model\NotificationAlertModel;
use App\Model\rolesModel;
use App\Model\userModel;
use App\Transaction;
use Auth;
use Illuminate\Http\Request;

/**
 * Generate URL from its components (i.e., opposite of built-in php function, parse_url())
 *
 * @param array $components
 *
 * @return string
 */
function build_url(array $parts)
{
    return (isset($parts['scheme']) ? "{$parts['scheme']}:" : '') .
        ((isset($parts['user']) || isset($parts['host'])) ? '//' : '') .
        (isset($parts['user']) ? "{$parts['user']}" : '') .
        (isset($parts['pass']) ? ":{$parts['pass']}" : '') .
        (isset($parts['user']) ? '@' : '') .
        (isset($parts['host']) ? "{$parts['host']}" : '') .
        (isset($parts['port']) ? ":{$parts['port']}" : '') .
        (isset($parts['path']) ? "{$parts['path']}" : '') .
        (isset($parts['query']) ? "?{$parts['query']}" : '') .
        (isset($parts['fragment']) ? "#{$parts['fragment']}" : '');
}

class campaignsController extends Controller
{
    public function __construct()
    {
        $this->outputData = array();
        $bannerSizes = getBannerSizes();
        $this->outputData['bannerSize'] = $bannerSizes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->hasRole('admin')) {
            $campaign = campaign::where('isDeleted', 'No')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $campaign = campaign::where('advertiser_id', Auth::user()->id)
                ->where('isDeleted', 'No')
                ->orderBy('id', 'desc')
                ->get();
            foreach ($campaign as $key => $value) {
                $camp = campaignorders::where('campaign_id', $value->id)->first();
                if (!empty($camp) && $camp->campaign_running_status == "activated") {
                    $value->campActive = "true";
                }
            }
        }
        $this->outputData['campaignsData'] = $campaign;

        $this->outputData['categories'] = json_decode(json_encode(category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get()), true);

        if (Auth::user()->hasRole('vendor')) {
            return view('campaigns.view-campaigns-new', $this->outputData);
        }

        return view('campaigns.view-campaigns', $this->outputData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*$arrMyWalletAmt = Transaction::select('amount')
        ->where('user_id',Auth::user()->id)
        ->first();*/
        $arrMyWalletAmt = Transaction::where('user_id', Auth::user()->id)->sum('amount');
        /*print_r($arrMyWalletAmt);
        echo "array amount wallet is ".$arrMyWalletAmt;*/

        if (Auth::user()->hasRole('vendor')) {
            if (isset($arrMyWalletAmt) && !empty($arrMyWalletAmt) && $arrMyWalletAmt >= 5) {
                $vendor = rolesModel::with('GetVendor')
                    ->where('role_id', "2")
                    ->get();

                $this->outputData['Advertiser'] = $vendor;

                $category = category::where('isActive', 'Active')
                    ->where('isDeleted', 'No')
                    ->get();

                $this->outputData['categoryData'] = $category;

                return view('campaigns.add-campaigns-new', $this->outputData);
            } else {
                \Session::flash('Error_message', "You must have a minimum of $5 in your Account to Create Ads");
                return redirect('/dashboard');
            }
        } else {
            $vendor = rolesModel::with('GetVendor')
                ->where('role_id', "2")
                ->get();
            $this->outputData['Advertiser'] = $vendor;

            $category = category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get();
            $this->outputData['categoryData'] = $category;
            return view('campaigns.add-campaigns', $this->outputData);
        }
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = "")
    {
        $input = $request->all();

        $is_cpa = false;

        if (isset($input['campaign_type'])) {
            if ($input['campaign_type'] == 'CPA') {
                $is_cpa = true;
            }

            if (!$is_cpa) {
                $input['campaign_success_url'] = $input['campaign_url'];
            }
        }

        // Edit campaign, redirect to page ???

        if (!empty($id)) {
            $Id = base64_decode($id);
            $campaignsData = campaign::find($Id);
            $this->outputData['campaignsData'] = $campaignsData;
            $arrVendor = rolesModel::with('GetVendor')
                ->where('role_id', "2")
                ->get();
            $this->outputData['Advertiser'] = $arrVendor;

            $category = category::where('isActive', 'Active')->where('isDeleted', 'No')->get();
            $this->outputData['categoryData'] = $category;

            if (Auth::user()->hasRole('vendor')) {
                return view('campaigns.add-campaigns-new', $this->outputData);
            }

            return view('campaigns.add-campaigns', $this->outputData);

        } else {

            $type = "";

            // Edit campaign too, api insert

            if (isset($input['id'])) {

                $Id = $input['id'];
                unset($input['id']);
                unset($input['_token']);

                if (isset($input['campaign_banner']) && !empty($input['campaign_banner'])) {
                    if (is_object($input['campaign_banner'])) {
                        $fileOrgName = $input['campaign_banner'];
                        $fileOrgName = pathinfo($fileOrgName, PATHINFO_FILENAME);
                        $fileOrgName = preg_replace('/[^A-Za-z0-9\-._]/', '', $fileOrgName);
                        $fileExtension = $input['campaign_banner']->getClientOriginalExtension();
                        $fileName = time() . '.' . $fileExtension;
                        $arrFileDetail = $input['campaign_banner'];
                        $arrFileDetail->move('public/uploads/campaign_banners/', $fileName);
                        $input['campaign_banner'] = $fileName;
                    } else {
                        $input['campaign_banner'] = $input['campaign_banner'];
                    }
                } else {
                    $input['campaign_banner'] = $input['old_campaign_banner'];
                }

                unset($input['old_campaign_banner']);
                campaign::where('id', $Id)->update($input);
                \Session::flash('flash_message', 'Campaign has been updated successfully.');
            } else {

                // Create new campaign

                $campaign_banner = $input['campaign_banner'];

                if (isset($campaign_banner) && !empty($campaign_banner)) {
                    if (is_object($campaign_banner)) {
                        $fileOrgName = $campaign_banner;
                        $fileOrgName = pathinfo($fileOrgName, PATHINFO_FILENAME);
                        $fileOrgName = preg_replace('/[^A-Za-z0-9\-._]/', '', $fileOrgName);
                        $fileExtension = $campaign_banner->getClientOriginalExtension();
                        $fileName = time() . '.' . $fileExtension;
                        $arrFileDetail = $campaign_banner;
                        $arrFileDetail->move('public/uploads/campaign_banners/', $fileName);
                        $input['campaign_banner'] = $fileName;
                    } else {
                        $input['campaign_banner'] = $campaign_banner;
                    }
                }

                unset($input['_token']);
                $campaign = new campaign;
                foreach ($input as $key => $value) {
                    $campaign->$key = trim($value);
                }

                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $campaign_code = substr(str_shuffle($permitted_chars), 0, 10);
                $campaign->campaign_code = $campaign_code;

                $campaign->save();

                $Notify = new NotificationAlertModel;
                $Notify->heading = "New Campaign \"<b>" . $campaign->campaign_name . "</b>\" has been added";
                $Notify->content = $input['campaign_name'] . " Campaign has been added";
                $Notify->type = "Campaign Added";
                $Notify->Notify_Receivers_Id = "1";
                $Notify->save();

                \Session::flash('flash_message', 'Campaign has been updated successfully.');
            }

            // if (strtoupper($type) != 'CPA') {
            //     return back()->withInput()->with('flash_message', 'Campaign has been saved successfully.');
            // }

            \Session::flash('flash_message', 'Campaign has been saved successfully.');

            if ($is_cpa) {
                return redirect('/campaigns/embedding');
            }

            return redirect('/dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $campaign = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->orderBy('id', 'desc')
            ->paginate(6);

        $campCat = category::where('isDeleted', 'No')
            ->where('isActive', 'Active')
            ->orderBy('id', 'desc')
            ->get();

        $arrVendor = rolesModel::with('GetVendor')
            ->where('role_id', "2")
            ->get();

        $MaxPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->max('campaign_cost_per_action');

        $MinPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->min('campaign_cost_per_action');

        $this->outputData['MaxPrice'] = $MaxPrice;
        $this->outputData['MinPrice'] = $MinPrice;
        $this->outputData['Advertiser'] = $arrVendor;
        $this->outputData['campaignsData'] = $campaign;
        $this->outputData['campCatData'] = json_decode(json_encode($campCat), true);

        return view('campaigns.view', $this->outputData)->with('title', 'Available Ads');
    }

    public function filter(Request $request)
    {
        $input = $request->all();

        // $arrSearchTerms = array();
        $arrWhere = array("isDeleted" => "No", "campaign_approval_status" => "Approved");
        $campaign = campaign::where($arrWhere);

        if (isset($input['searchByname']) && !empty($input['searchByname'])) {
            $campaign = $campaign->where('campaign_name', 'like', "%" . $input['searchByname'] . "%");
        }

        if (isset($input['advertiser_id']) && !empty($input['advertiser_id'])) {
            $arrWhere = array("advertiser_id" => $input['advertiser_id']);
            $campaign = $campaign->where($arrWhere);
        }

        if (isset($input['category_id']) && !empty($input['category_id'])) {
            $arrWhere = array("campaign_category" => $input['category_id']);
            $campaign = $campaign->where($arrWhere);
        }

        if (isset($input['searchByPrice']) && !empty($input['searchByPrice'])) {
            // $price_range = explode(";", $input['searchByPrice']);
            $_min_range = $input['searchByPriceMin'];
            $_max_range = $input['searchByPriceMax'];
            // $campaign = $campaign->whereBetween('campaign_cost_per_action', [$price_range[0] - 1, $price_range[1] + 1]);
            $campaign = $campaign->whereBetween('campaign_cost_per_action', [$_min_range[0] - 1, $_max_range[1] + 1]);
            // $this->outputData['price_range'] = $price_range;
            $this->outputData['price_range'] = array($_min_range, $_max_range);
        }

        $campaign = $campaign->orderBy('id', 'desc')->paginate(4);

        $arrVendor = rolesModel::with('GetVendor')
            ->where('role_id', "2")
            ->get();

        $MaxPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->max('campaign_cost_per_action');

        $MinPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->min('campaign_cost_per_action');

        $campCat = category::where('isDeleted', 'No')
            ->where('isActive', 'Active')
            ->orderBy('id', 'desc')
            ->get();

        $this->outputData['MaxPrice'] = $MaxPrice;
        $this->outputData['Advertiser'] = $arrVendor;
        $this->outputData['MinPrice'] = $MinPrice;
        $this->outputData['campaignsData'] = $campaign;
        $this->outputData['campCatData'] = json_decode(json_encode($campCat), true);

        return view('campaigns.view', $this->outputData)->with('title', 'Campaigns');
    }

    public function viewbyArtist($id)
    {
        $Id = base64_decode($id);
        $campaign = campaign::where('campaign_approval_status', 'Approved')
            ->where('advertiser_id', $Id)
            ->where('isDeleted', 'No')
            ->orderBy('id', 'desc')
            ->paginate(4);

        $arrVendor = rolesModel::with('GetVendor')
            ->where('role_id', "2")
            ->get();
        $this->outputData['Advertiser'] = $arrVendor;

        $MaxPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->max('campaign_cost_per_action');

        $MinPrice = campaign::where('campaign_approval_status', 'Approved')
            ->where('isDeleted', 'No')
            ->min('campaign_cost_per_action');

        $this->outputData['MaxPrice'] = $MaxPrice;

        $this->outputData['MinPrice'] = $MinPrice;

        $this->outputData['campaignsData'] = $campaign;
        return view('campaigns.view', $this->outputData)->with('title', 'Campaigns');
    }

    public function show($id)
    {
        $Id = base64_decode($id);
        $campaignData = campaign::with('advertiser')
            ->where('id', $Id)
            ->first();

        $isCampaignActive = campaignorders::where('campaign_id', $Id)
            ->where('publisher_id', Auth::user()->id)
            ->where('campaign_running_status', 'activated')
            ->first();

        if (!empty($isCampaignActive)) {
            $campaignData->isCampaignActive = "true";
            $campaignData->advert_code = $isCampaignActive->advert_code;
        }

        $socmed = new SocialMedia();

        $social_media_names = $socmed->GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
        $social_media_urls = $socmed->GetSocialMediaSiteLinks_WithShareLinks([
            'url' => url('campaigns/share/' . base64_encode($campaignData->advert_code)),
            'title' => $campaignData->campaign_name,
            'image' => 'https://adbirt.com/uploads/campaign_banners/' . $campaignData->campaign_banner,
            'desc' => $campaignData->campaign_description,
            'appid' => '',
            'redirecturl' => '',
            'via' => '',
            'hashtags' => '',
            'provider' => '',
            'language' => '',
            'userid' => '',
            'category' => '',
            'phonenumber' => '',
            'emailaddress' => '',
            'ccemailaddress' => '',
            'bccemailaddress' => '',
        ]);
        $socialArr = array();
        foreach ($social_media_names as $social_media_name) {
            $social_media_url = $social_media_urls[$social_media_name];
            if ($social_media_name == "ok.ru") {
                $social_media_name = "okru";
            }

            //if($social_media_name != "facebook")
            $socialArr[$social_media_name] = $social_media_url;
            //print($social_media_name . ' : ' . $social_media_url . "\n\n");
        }
        $this->outputData['socialData'] = $socialArr;
        $this->outputData['campaignData'] = $campaignData;

        $this->outputData['categories'] = json_decode(json_encode(category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get()), true);

        return view('campaigns.campaigns-detail', $this->outputData);
    }

    public function share($id)
    {
        $publisher_code = base64_decode($id);
        //get campaign id from publisher code
        $publisher = campaignorders::where('advert_code', $publisher_code)
            ->where('campaign_running_status', 'activated')
            ->first();
        //echo "** camp id ";
        //print_r($publisher->campaign_id);
        $bnr = campaign::where('id', $publisher->campaign_id)
            ->where('campaign_approval_status', 'Approved')
            ->where('isActive', 'Active')
            ->where('isDeleted', 'No')
            ->first();
        /*if(!empty($bnr)){
        $bnr->campaign_view += 1;
        $bnr->save();
        }*/

        $this->outputData['campaignData'] = $bnr;
        $this->outputData['id'] = $id;
        return view('campaigns.share', $this->outputData);
    }

    public function inccampview($id)
    {
        $publisher_code = base64_decode($id);
        //get campaign id from publisher code
        $publisher = campaignorders::where('advert_code', $publisher_code)
            ->where('campaign_running_status', 'activated')
            ->first();
        //echo "** camp id ";
        //print_r($publisher->campaign_id);
        $bnr = campaign::where('id', $publisher->campaign_id)
            ->where('campaign_approval_status', 'Approved')
            ->where('isActive', 'Active')
            ->where('isDeleted', 'No')
            ->first();

        if (!empty($bnr)) {
            $bnr->campaign_view += 1;
            $bnr->save();
        }

        return redirect('/ubm_banner_click/' . $id);
    }

    public function viewCamp($id)
    {
        //
        $Id = base64_decode($id);
        $campaignData = campaign::with('advertiser')
            ->where('id', $Id)
            ->first();

        if (Auth::user()->hasRole('vendor')) {
            $isCampaignActive = campaignorders::where('campaign_id', $Id)
                ->where('advertiser_id', Auth::user()->id)
                ->where('campaign_running_status', 'activated')
                ->first();
        } else {
            $isCampaignActive = campaignorders::where('campaign_id', $Id)
                ->where('publisher_id', Auth::user()->id)
                ->where('campaign_running_status', 'activated')
                ->first();
        }

        if (!empty($isCampaignActive)) {
            $campaignData->isCampaignActive = "true";
            $campaignData->advert_code = $isCampaignActive->advert_code;
        }

        $socmed = new SocialMedia();

        $social_media_names = $socmed->GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
        $social_media_urls = $socmed->GetSocialMediaSiteLinks_WithShareLinks([
            'url' => url('campaigns/share/' . base64_encode($campaignData->advert_code)),
            'title' => $campaignData->campaign_name,
            'image' => 'https://adbirt.com/uploads/campaign_banners/' . $campaignData->campaign_banner,
            'desc' => $campaignData->campaign_description,
            'appid' => '',
            'redirecturl' => '',
            'via' => '',
            'hashtags' => '',
            'provider' => '',
            'language' => '',
            'userid' => '',
            'category' => '',
            'phonenumber' => '',
            'emailaddress' => '',
            'ccemailaddress' => '',
            'bccemailaddress' => '',
        ]);
        $socialArr = array();
        foreach ($social_media_names as $social_media_name) {
            $social_media_url = $social_media_urls[$social_media_name];
            if ($social_media_name == "ok.ru") {
                $social_media_name = "okru";
            }

            //if($social_media_name != "facebook")
            $socialArr[$social_media_name] = $social_media_url;
            //print($social_media_name . ' : ' . $social_media_url . "\n\n");
        }
        $this->outputData['socialData'] = $socialArr;

        $this->outputData['categories'] = json_decode(json_encode(category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get()), true);

        $this->outputData['campaignData'] = $campaignData;
        return view('campaigns.campaigns-detail', $this->outputData);
    }

    public function advertisers()
    {

        $arrVendor = rolesModel::with('GetVendor', 'profile')
            ->where('role_id', "2")
            ->get();
        foreach ($arrVendor as $key => $value) {
            $usersCamp = campaign::where('advertiser_id', $value->user_id)->count();
            if ($usersCamp == "0") {
                unset($arrVendor[$key]);
            }
        }
        $this->outputData['Advertiser'] = $arrVendor;
        return view('campaigns.view-advertiser', $this->outputData)->with('title', 'All Advertisers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChngeToApprove($id)
    {
        //
        $Id = base64_decode($id);

        $campaignData = campaign::find($Id);

        $status['campaign_approval_status'] = 'Approved';
        campaign::where('id', $Id)->update($status);

        $Notify = new NotificationAlertModel;
        $Notify->heading = "Your Campaign has been approved";
        $Notify->content = "Your Campaign '" . $campaignData->campaign_name . "' has been approved By Admin";
        $Notify->type = "Campaign Approved";
        $Notify->Notify_Receivers_Id = $campaignData['advertiser_id'];
        $Notify->save();

        //send email to advertiser campaign approved
        //echo "advertiser id is ".$campaignData['advertiser_id'];
        $userData = userModel::find($campaignData['advertiser_id']);
        //print_r($userData);
        $email = $userData->email;
        $AdvertiserMsg = "Dear " . $userData->name . ", Congrats! Your ads have been approved on Adbirt. ";
        $heading = "Campaign Approved";
        $data['heading'] = $heading;
        $data['TextToClient'] = $AdvertiserMsg;
        // Mail::send('email.campaignconsumed', $data, function ($message) use ($email) {
        //     $message->from('info@adbirt.com', 'Adbirt');
        //     $message->to($email)->subject('Campaign Approved');
        // });
        //echo "**email sent";

        $arrPublisher = rolesModel::with('GetVendor')
            ->where('role_id', "3")
            ->get();
        //print_r($arrPublisher);
        foreach ($arrPublisher as $publisher) {
            $pubEMail = $publisher->GetOwner->email;
            $pubName = $publisher->GetOwner->name;
            //echo "** email is $pubEMail , pubname $pubName";
            //if(strpos($pubEMail, "pankaj.sharma") !== false){
            //Hi Paul, a new campaign has been activated on Adbirt! and now ready to be promoted.
            //send email to publiser when campaign approved
            $AdvertiserMsg = "Dear " . $pubName . ", a new campaign has been activated on Adbirt! and now ready to be promoted. ";
            $heading = "Campaign Activated";
            $data['heading'] = $heading;
            $data['TextToClient'] = $AdvertiserMsg;
            // Mail::send('email.campaignconsumed', $data, function ($message) use ($pubEMail) {
            //     $message->from('info@adbirt.com', 'Adbirt');
            //     $message->to($pubEMail)->subject('Campaign Activated');
            // });
            //echo "**email sent";

            //}
        }

        \Session::flash('flash_message', "Campaign Status has been updated successfully");
        return redirect('/campaigns/view-campaigns');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChngeToReject($id)
    {
        $Id = base64_decode($id);

        $campaignData = campaign::find($Id);

        $status['campaign_approval_status'] = 'Rejected';
        campaign::where('id', $Id)
            ->update($status);

        $Notify = new NotificationAlertModel;
        $Notify->heading = "Your Campaign has been Rejected By Admin";
        $Notify->content = "Your Campaign \"" . $campaignData['campaign_name'] . "\" has been Rejected By Admin";
        $Notify->type = "Campaign Rejected";
        $Notify->Notify_Receivers_Id = $campaignData['advertiser_id'];
        $Notify->save();

        \Session::flash('flash_message', "Campaign Status has been updated successfully");
        return redirect('/campaigns/view-campaigns');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function embedding()
    {
        return view('campaigns.embedding-requirements', $this->outputData);
    }

    // register_publisher_site
    public function registerPublisherSite(Request $request)
    {
        $input = $request->all();
        $bannerCode = $input['bannerCode'];
        $url = $input['url'];

        $publisher_code = base64_decode($bannerCode);

        $campaignorder = campaignorders::where('advert_code', $publisher_code)
            ->where('campaign_running_status', 'activated')
            ->first();

        $campaign = campaign::where('id', $campaignorder->campaign_id)
            ->where('campaign_approval_status', 'Approved')
            ->where('isActive', 'Active')
            ->where('isDeleted', 'No')
            ->first();

        $_time = time();

        $this->outputData['status'] = "Invalid";

        if (isset($campaign)) {
            $published_by = $campaign->published_by;

            if (strpos($campaign->published_by, '-UNKNOWN-') != false) {
                $campaign->published_by = '';
            }

            $_published_by = explode("-sep-", $published_by);

            if (in_array($url, $_published_by)) {
                $this->outputData['status'] = "Already Published";
                // return $_published_by;
            } else {
                array_push($_published_by, $url);
                $published_by = implode("-sep-", $_published_by);
                $campaign->published_by = $published_by;
                // $campaign->update(array(
                //     'published_by' => $published_by
                // ));
                $campaign->save();
                $this->outputData['status'] = "Published";
            }

            $this->outputData['campaign'] = $campaign;
        }

        return $this->outputData;
    }

    public function getbanner(Request $request)
    {
        $input = $request->all();

        $bannerCodes = explode('-sep-', $input['ubm_banners']);
        $bannerCodes = array_filter($bannerCodes);

        $html = '';

        $banners = array();
        foreach ($bannerCodes as $key => $value) {
            $value = json_decode($value, true);

            $bannerCode = $value['bannerCode'];
            $nativeType = $value['nativeType'] ?? 'recommended'; // 'recommended', 'feed'
            if ($nativeType == 'undefined') {
                $nativeType = 'recommended';
            }

            $publisher_code = base64_decode($bannerCode);

            // get campaign id from publisher code
            unset($campaign);
            $campaign = campaignorders::where('advert_code', $publisher_code)
                ->where('campaign_running_status', 'activated')
                ->first();

            unset($bnr);
            $bnr = campaign::where('id', $campaign->campaign_id)
                ->where('campaign_approval_status', 'Approved')
                ->where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->first();

            if (!empty($bnr) && $bnr != null) {
                $size = explode(' x ', $bnr->banner_size);
                $type_details['width'] = $size['0'];
                $type_details['height'] = $size['1'];
                $str = url('/');
                $words = explode("/", $str);
                array_splice($words, -1);
                $url = implode("/", $words);

                $_time = time();
                $rand_id = "adbirt-$_time";

                ob_start();
                if (($bnr->campaign_type == 'CPA') || ($bnr->campaign_type == 'CPC')) {
                    if ($bnr->banner_type == 'image') {
                        ?>
                            <a id="<?php echo $rand_id; ?>" target="_blank" class="ubm_banner" href="<?php echo url('ubm_banner_click/' . base64_encode($publisher_code)) ?>" style="<?php echo (empty($bnr->campaign_url) ? 'cursor: default; ' : 'cursor: pointer;') . ' width: ' . $type_details["width"] . 'px !important; height: ' . $type_details["height"] . 'px !important; line-height: ' . $type_details["height"] . 'px;' ?> border: 1px solid transparent !important;" <?php (empty($bnr->campaign_url) ? ' onclick="return false;"' : '')?> title="<?php echo $bnr->campaign_name; ?>">
                                <img data-banner-code="<?php echo $bannerCode; ?>" width="<?php echo $type_details["width"]; ?>" height="<?php echo $type_details["height"]; ?>" style="width: <?php echo $type_details["width"]; ?> !important; height: <?php echo $type_details["height"]; ?> !important;" src="https://www.adbirt.com/public/uploads/campaign_banners/<?php echo $bnr->campaign_banner; ?>" />
                            </a>
                        <?php
} elseif ($bnr->banner_type == 'video') {
                        ?>
                        <div id="<?php echo $rand_id; ?>" class="adbirt-video-ad ubm_banner">
                            <style>
                                #<?php echo $rand_id; ?> {
                                    width: 100%;
                                    height: auto;
                                    position: relative;
                                }

                                #<?php echo $rand_id; ?>>.adbirt-banner-video {
                                    position: static;
                                    bottom: 0;
                                    width: 100% !important;
                                    max-width: 100% !important;
                                    height: auto;
                                }

                                #<?php echo $rand_id; ?>>.content {
                                    position: static;
                                    background: rgba(0, 0, 0, 1);
                                    color: #fff;
                                    width: 100%;
                                    padding: 20px;
                                }

                                #<?php echo $rand_id; ?>>.content>.banner-title {
                                    text-overflow: ellipsis;
                                    font-size: 18px;
                                    padding: 8px;
                                    padding-bottom: 10px;
                                    color: #fff !important;
                                }

                                #<?php echo $rand_id; ?>>.content>.banner-link-holder>.adbirt-banner-link {
                                    font-size: 18px;
                                    padding: 8px;
                                    border: 1px solid #fff;
                                    background: #000;
                                    border-radius: 10px;
                                    /* cursor: pointer; */
                                }

                                #<?php echo $rand_id; ?>>.content>p {
                                    text-align: center;
                                    color: #fff !important;
                                    padding-bottom: 4px;
                                    font-weight: 900;
                                    cursor: pointer;
                                    margin: 0px !important;
                                    padding: 4px !important;
                                }

                                #<?php echo $rand_id; ?>>.content>.banner-link-holder>.adbirt-banner-link {
                                    background: #fff !important;
                                    color: black !important;
                                }
                            </style>
                            <div class="content">
                                <p class="banner-title"><?php echo $bnr->campaign_name; ?></p>
                            </div>
                            <video data-banner-code="<?php echo $bannerCode; ?>" controls loop class="adbirt-banner-video" src="<?php echo 'https://adbirt.com/public/uploads/campaign_banners/' . $bnr->campaign_banner; ?>"></video>
                            <div class="content">
                                <p class="banner-title"><?php echo $bnr->campaign_description; ?></p>
                                <p class="banner-link-holder">
                                    <a target="_blank" class="adbirt-banner-link" href="<?php echo url('ubm_banner_click/' . base64_encode($publisher_code)) ?>">Visit</a>
                                </p>
                            </div>
                        </div>
                    <?php
}
                } elseif ($bnr->campaign_type == 'Native Content Ad') {
                    if ($nativeType == 'recommended') {

                        $similar_campaigns = campaign::where('campaign_category', $bnr->campaign_category)
                            ->where('campaign_approval_status', 'Approved')
                            ->where('isActive', 'Active')
                            ->where('id', '!=', $bnr->id)
                            ->where('campaign_type', 'Native Content Ad')
                            ->where('isDeleted', 'No')
                            ->limit(3)->get();

                        $has_similar_campaigns = count($similar_campaigns) > 0;

                        ?>
                        <!-- Begin: Adbirt Native Ads recommendation -->
                        <div id="<?php echo $rand_id; ?>" class="adbirt-native-recommendations ubm_banner">
                            <style>
                                .adbirt-native-recommendations {
                                    display: block;
                                }

                                .adbirt-native-recommendations,
                                .adbirt-native-recommendations * {
                                    box-sizing: border-box;
                                }

                                .adbirt-native-recommendations-header {
                                    display: flex;
                                    flex-direction: row;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding-left: 8px;
                                    padding-right: 8px;
                                    padding-top: 8px;
                                    padding-bottom: 3px;
                                    /* border-top: 1px solid #000; */
                                    margin-top: 8px;
                                }

                                .adbirt-native-recommendations-header-title>h4 {
                                    margin-top: 4px;
                                    margin-bottom: 0px;
                                    font-size: 30px;
                                    font-weight: 900;
                                }

                                .adbirt-native-recommendations-content {
                                    display: flex;
                                    flex-direction: row;
                                    align-items: flex-start;
                                    justify-content: flex-start;
                                    flex-wrap: wrap;
                                }

                                .adbirt-single-recommendation-image-holder>img.adbirt-single-recommendation-image {
                                    /* width: 100%; */
                                    width: 293px !important;
                                }

                                .adbirt-single-recommendation-image-holder>img.adbirt-single-recommendation-image:hover {
                                    box-shadow: 1px 1px 18px 18px #ddd;
                                }

                                .adbirt-single-recommendation-image-holder {
                                    width: 100%;
                                }

                                .adbirt-native-recommendations-footer {
                                    padding: 8px;
                                    /* border-top: 1px solid #000; */
                                    margin-bottom: 8px;
                                }

                                .adbirt-single-recommendation-title {
                                    padding: 8px;
                                    margin: 0px !important;
                                    font-size: 18px;
                                }

                                .adbirt-single-recommendation-title>a {
                                    text-decoration: none;
                                    font-weight: 600;
                                    /* color: #000; */
                                }

                                .adbirt-native-recommendations-info>a>small {
                                    font-size: 12px;
                                }

                                .adbirt-single-recommendation-wrapper {
                                    /* cursor: pointer; */
                                    padding: 8px;
                                }

                                .adbirt-single-recommendation:hover {
                                    border-radius: 10px !important;
                                    overflow: clip;
                                }

                                @media (min-width: 100px) {
                                    /* .adbirt-single-recommendation-wrapper {
                                        width: 100%;
                                    } */

                                    .adbirt-native-recommendations-header {
                                        flex-direction: column;
                                    }
                                }

                                @media (min-width: 250px) {
                                    /* .adbirt-single-recommendation-wrapper {
                                        width: 50%;
                                    } */
                                }

                                @media (min-width: 600px) {
                                    /* .adbirt-single-recommendation-wrapper {
                                        width: 25%;
                                    } */

                                    .adbirt-native-recommendations-header {
                                        flex-direction: row;
                                    }
                                }
                            </style>
                            <div class="adbirt-native-recommendations-container">
                                <div class="adbirt-native-recommendations-header">
                                    <div class="adbirt-native-recommendations-header-title">
                                        <h4>Recommended</h4>
                                    </div>
                                    <div class="adbirt-native-recommendations-info">
                                        <!-- <a href="https://adbirt.com/actions-and-events" target="_blank">
                                            <small>
                                                Learn More >
                                            </small>
                                        </a> -->
                                        &nbsp;
                                    </div>
                                </div>

                                <div class="adbirt-native-recommendations-content">

                                    <div class="adbirt-single-recommendation-wrapper">
                                        <div class="adbirt-single-recommendation">
                                            <p class="adbirt-single-recommendation-title">
                                                <!-- <a href="<?php
// echo url('ubm_banner_click/' . base64_encode($publisher_code));
                        ?>" target="_blank"><?php echo $bnr->campaign_name; ?></a> -->
                                            </p>
                                            <div class="adbirt-single-recommendation-image-holder">
                                                <img data-banner-code="<?php echo $bannerCode; ?>" src="<?php echo 'https://www.adbirt.com/public/uploads/campaign_banners/' . $bnr->campaign_banner; ?>" alt="Recommendation text" class="adbirt-single-recommendation-image">
                                            </div>
                                            <p class="banner-title">
                                                <a href="<?php echo url('ubm_banner_click/' . base64_encode($publisher_code)) ?>" target="_blank"><?php echo $bnr->campaign_description; ?></a>
                                            </p>
                                        </div>
                                    </div>

                                    <?php
$similar_campaigns = [];
                        foreach ($similar_campaigns as $key => $similar) {
                            ?>
                                        <div class="adbirt-single-recommendation-wrapper">
                                            <div class="adbirt-single-recommendation">
                                                <p class="adbirt-single-recommendation-title">
                                                    <!-- <a href="<?php
// echo url('ubm_banner_click/' . base64_encode($publisher_code));
                            ?>" target="_blank"><?php echo $similar->campaign_name; ?></a> -->
                                                </p>
                                                <div class="adbirt-single-recommendation-image-holder">
                                                    <img data-banner-code="<?php echo $bannerCode; ?>" src="<?php echo 'https://www.adbirt.com/public/uploads/campaign_banners/' . $similar->campaign_banner; ?>" alt="Recommendation text" class="adbirt-single-recommendation-image">
                                                </div>
                                                <a href="<?php echo url('ubm_banner_click/' . base64_encode($publisher_code)) ?>" target="_blank">
                                                    <p class="banner-title"><?php echo $bnr->campaign_description; ?></p>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
}
                        ?>

                                </div>

                                <div class="adbirt-native-recommendations-footer">
                                    <strong>
                                        <em>
                                            Sponsored by <a href="https://adbirt.com" target="_blank">Adbirt</a>
                                        </em>
                                    </strong>
                                </div>

                            </div>
                        </div>
                        <!-- End: Adbirt Native Ads recommendation -->
                    <?php
} else if ($nativeType == 'feed') {
                        ?>
                        &nbsp;
<?php
}
                }
                $html = ob_get_clean();

                // increment number of views for the campaign by 1
                $bnr->campaign_view += 1;
                $bnr->save();
            }
            $banners[] = $html;
        }

        $data = array('html' => json_encode($banners));
        return $data;
    }

    public function bannerClick(Request $request, $id = "")
    {
        $header = $request->header();
        $destUrl = "";

        $clicked_successfully = false;
        $error_message = 'Something went wrong!!!';

        if (isset($header['referer']['0']) && !empty($header['referer']['0'])) {
            $destUrl = $header['referer']['0'];
        } else {
            $destUrl = 'https://adbirt.com';
        }

        $id = base64_decode($id);

        if ($id) {
            $publisher = campaignorders::where('advert_code', $id)
                ->where('campaign_running_status', 'activated')
                ->first();

            $bnr = campaign::where('id', $publisher->campaign_id)
                ->where('campaign_approval_status', 'Approved')
                ->where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->first();

            if (!empty($bnr)) {
                $bnr->campaign_click += 1;
                $bnr->save();

                if (strtoupper($bnr->campaign_type) != 'CPA') {
                    $url = "https://adbirt.com/campaigns/verified";

                    $_fields = array(
                        'campaign_code' => $id,
                    );

                    $_fields_string = '';
                    foreach ($_fields as $key => $value) {
                        $_fields_string .= $key . '=' . $value . '&';
                    }
                    rtrim($_fields_string, '&');
                    //open connection
                    $ch = curl_init();

                    //set the url, number of POST vars, POST data
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, count($_fields));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $_fields_string);

                    //execute post
                    $raw_response = curl_exec($ch);
                    //close connection
                    curl_close($ch);

                    if ($raw_response == false) {
                        // $clicked_successfully = false;
                    }

                    try {
                        $http_response = json_decode($raw_response, true);
                        if (isset($http_response['status']) && intval($http_response['status']) == 200) {
                            $clicked_successfully = true;
                        } else {
                            // $clicked_successfully = false;
                            $error_message = $http_response['message'];
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                        // $clicked_successfully = false;
                        $error_message = $th->getMessage();
                    }
                }

                if (!$clicked_successfully) {
                    return $error_message;
                }

                $_camp_code = $id;

                $url_components = parse_url($bnr->campaign_url);
                $url_components['query'] = $url_components['query'] ?? '';

                parse_str($url_components['query'], $_query_params);

                $_query_params['camp_code'] = $_camp_code;

                $url_components['query'] = http_build_query($_query_params);

                $destination_url = build_url($url_components);

                // return redirect($bnr->campaign_url . "?camp_code=" . $id);
                return redirect($destination_url);
            } else {
                dd('Invalid campaign, or campaign not yet approved');
            }
        } else {
            dd('Banner ID is missing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewall()
    {
        $MyCampaigns = campaignorders::with('campaign')
            ->where('publisher_id', Auth::user()->id)
            ->where('campaign_running_status', 'activated')
            ->get();

        $this->outputData['categories'] = json_decode(json_encode(category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get()), true);

        $this->outputData['campaignsData'] = $MyCampaigns;

        return view('campaigns.my-campaigns', $this->outputData);
    }

    public function activeCamp(Request $request)
    {
        $input = $request->all();

        $is_remote_request = false;
        if (isset($input['is_remote_request']) && $input['is_remote_request'] == true) {
            $is_remote_request = true;
        }

        $MyCampaigns = campaignorders::with('campaign')
            ->where('advertiser_id', Auth::user()->id)
            ->where('campaign_running_status', 'activated')
            ->orderBy('updated_at')
            ->groupBy('updated_at')
            ->get();

        $this->outputData['campaignsData'] = $MyCampaigns;

        $this->outputData['categories'] = json_decode(json_encode(category::where('isActive', 'Active')
                ->where('isDeleted', 'No')
                ->get()), true);

        if ($is_remote_request) {
            return response()->json($this->outputData);
        }

        if (Auth::user()->hasRole('vendor')) {
            return view('campaigns.my-campaigns-new', $this->outputData);
        }

        return view('campaigns.my-campaigns', $this->outputData);
    }

    public function destroy(Request $request)
    {
        $input = $request->all();
        $Id = $input['id'];
        $del['isDeleted'] = 'Yes';
        campaign::where('id', $Id)->update($del);
        echo "true";
        die;
    }
}
