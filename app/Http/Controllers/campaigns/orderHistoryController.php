<?php

namespace App\Http\Controllers\campaigns;

use App\Http\Controllers\Controller;
use App\Model\campaign;
use App\Model\campaignorders;
use App\Model\campaignTransaction;
use App\Model\commissionratioModel;
use App\Model\NotificationAlertModel;
use App\Model\WalletHistoryModel;
use App\Transaction;
use Auth;
use Illuminate\Http\Request;
use Mail;

class orderHistoryController extends Controller
{
    public function __construct()
    {
        $this->outputData = array();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function run($id)
    {
        $Id = base64_decode($id);
        $RunCam = campaign::find($Id);

        $ordr = new campaignorders;
        $ordr->campaign_id = $Id;
        $ordr->publisher_id = Auth::user()->id;
        $ordr->advertiser_id = $RunCam->advertiser_id;
        $ordr->advert_code = $this->code();
        $ordr->campaign_price = $RunCam->campaign_cost_per_action;
        $ordr->save();

        $Notify = new NotificationAlertModel;
        $Notify->heading = $RunCam['campaign_title'] . " Campaign is Activated";
        $Notify->content = $RunCam['campaign_title'] . " Campaign is Activated, for more information read embedd details";
        $Notify->type = "Campaign is Activated";
        $Notify->Notify_Receivers_Id = Auth::user()->id;
        $Notify->save();

        \Session::flash('flash_message', "Campaign activated successfully");

        // return redirect('/campaigns/show/' . $id);
        return redirect('campaigns/embedding');
    }

    public function stopRunning($advert_code)
    {
        $order = campaignorders::with('campaign')
            ->where('advert_code', $advert_code)
            ->first();

        $order->delete();

        \Session::flash('flash_message', "Campaign successfully Unpublished!");

        if (!Auth::user()) {
            return array(
                'status' => 200,
                'deleted' => true,
            );
        }
    }

    public function code()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 10; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        if ($this->NumberExists($string)) {
            return $this->code();
        }
        return $string;
    }

    public function NumberExists($number)
    {
        return campaignorders::where('advert_code', $number)->exists();
    }

    public function getDomain($url)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $regs['domain'];
        }
        return false;
    }

    public function credit(Request $request)
    {
        $input = $request->all();
        $header = $request->header();

        $destUrl = "";

        if (isset($header['referer']['0']) && !empty($header['referer']['0'])) {
            $destUrl = $header['referer']['0'];
        }

        if ($destUrl == "") {
            $destUrl = getUserIp() ?? "https://adbirt.com/";
        }

        $destUrl = $this->getDomain($destUrl);

        if (!isset($input['campaign_code']) || empty($input['campaign_code'])) {
            $this->outputData['message'] = "campaign code is required ";
            return response()->json($this->outputData, 409);
        }

        $code = $input['campaign_code'];
        $uniq_id = $input['uniq_id'] ?? (time() . '-' . time() . '-transaction');
        $advert = campaignorders::with('campaign', 'advertiser', 'publisher')
            ->where('advert_code', $code)
            ->first();

        if (!empty($advert->campaign)) {

            $startDate = date('Y-m-d H:i:s');
            $Time = date('Y-m-d H:i:s', strtotime("-1 minutes", strtotime($startDate)));
            $isSpam = campaignTransaction::where('client_ip', getUserIp())
                ->where('created_at', '<', $startDate)
                ->where('created_at', '>', $Time)
                ->first();

            if (!empty($advert) && $advert->campaign->isActive == "Active" && empty($isSpam)) {

                $tra = new campaignTransaction;
                $tra->advertiser_id = $advert->advertiser_id;
                $tra->publisher_id = $advert->publisher_id;
                $tra->client_ip = getUserIp();
                $tra->uniq_id = $uniq_id;
                $tra->campaign_code = $code;
                $tra->save();

                $cost_per_action = $advert->campaign->campaign_cost_per_action;

                $comm = commissionratioModel::first();
                // $admincommission = (float) (((float) $cost_per_action * (float) $comm->admin_ratio) / 100);
                $admincommission = ((float) $cost_per_action / 100) * $comm->admin_ratio;
                $publishercommission = (float) $cost_per_action - $admincommission;

                $balance = Transaction::where('user_id', $advert->advertiser_id)
                    ->sum('amount');

                if ($balance >= $cost_per_action) {
                    $remainingAmt = $balance - $cost_per_action;

                    // debit the advertiser
                    $advertiser_transaction = new Transaction();
                    $advertiser_transaction->method_id = 1;
                    $advertiser_transaction->amount = 0 - $cost_per_action;
                    $advertiser_transaction->user_id = $advert->advertiser_id;
                    $advertiser_transaction->save();

                    // add wallet entry for the admin
                    $advertiser_wallet = new WalletHistoryModel;
                    $advertiser_wallet->user_id = "1";
                    $advertiser_wallet->amount = "0";
                    $advertiser_wallet->commision = $admincommission;
                    $advertiser_wallet->mode = "commision";
                    $advertiser_wallet->comment = "$" . number_format($admincommission, 2) . " was Credited to your Wallet for Campaign commision of '" . $advert->campaign->campaign_name . "'";
                    $advertiser_wallet->save();

                    // credit the publisher with commission
                    $publisher_transaction = new Transaction();
                    $publisher_transaction->method_id = 1;
                    $publisher_transaction->amount = $publishercommission;
                    $publisher_transaction->user_id = $advert->publisher_id;
                    $publisher_transaction->save();

                    // add walletentry for the advertiser
                    $wallet = new WalletHistoryModel;
                    $wallet->user_id = $advert->advertiser_id;
                    $wallet->amount = $cost_per_action;
                    $wallet->commision = "0";
                    $wallet->mode = "debit";
                    $wallet->comment = "Debited $" . $cost_per_action . "for Campaign consumed ";
                    $wallet->save();

                    // Notify the advertiser
                    $Notify = new NotificationAlertModel;
                    $Notify->heading = "Your Campaign has been consumed";
                    $Notify->content = "Dear <b>\"" . $advert->advertiser->name . "\"</b>, Your Campaign <b>\"" . $advert->campaign->campaign_name . "\"</b> has just been patronized today at <b>\"" . $startDate . "\"</b>, kindly check and report any possible Malicious Activity";
                    $Notify->type = "Campaign consumed";
                    $Notify->Notify_Receivers_Id = $advert->advertiser_id;
                    $Notify->save();

                    // $AdvertiserMsg = "Dear " . $advert->advertiser->name . ", Your Campaign " . $advert->campaign->campaign_title . " has just been patronized today at " . $startDate . ", kindly check and report any possible Malicious Activity";

                    // if ($advert->advertiser->login == "phone") {
                    //     $AccountSid = "AC68fde1a039c71651c8f132177287b3e9"; // Your Account SID from www.twilio.com/console
                    //     $AuthToken = "c047895b53559aaf20cd8036f294108c"; // Your Auth Token from www.twilio.com/console
                    //     $client = new \Services_Twilio($AccountSid, $AuthToken);
                    //     try {
                    //         $Client_message = $client->account->messages->create(array(
                    //             "From" => "+12018856171", // From a valid Twilio number
                    //             "To" => $advert->advertiser->phone, // Text this number
                    //             "Body" => $AdvertiserMsg,
                    //         ));
                    //     } catch (\Services_Twilio_RestException $e) {
                    //     }
                    // } else {
                    //     // $email = $advert->advertiser->email;
                    //     // $heading = "Campaign Consumed";
                    //     // $data['heading'] = $heading;
                    //     // $data['TextToClient'] = $AdvertiserMsg;
                    //     // Mail::send('email.campaignconsumed', $data, function ($message) use ($email) {
                    //     //     $message->from('info@adbirt.com', 'Adbirt');
                    //     //     $message->to($email)->subject('Campaign Consumed');
                    //     // });
                    // }

                    // add wallet entry for the publisher
                    $wallet = new WalletHistoryModel;
                    $wallet->user_id = $advert->publisher_id;
                    $wallet->amount = $publishercommission;
                    $wallet->commision = "0";
                    $wallet->mode = "credit";
                    $wallet->comment = "Added Cash of " . $publishercommission;
                    $wallet->save();

                    // notify the publisher
                    $Notify = new NotificationAlertModel;
                    $Notify->heading = "Your Promoted Campaign has been consumed";
                    $Notify->content = "Dear \"<b>" . $advert->publisher->name . "\"</b>, your Promoted Campaign \"<b>" . $advert->campaign->campaign_name . "\"</b> from \"<b>" . $advert->advertiser->name . "</b>\" has just been patronize today at \"<b>" . $startDate . "\"</b> via your website/app \"<b>" . $destUrl . "</b>\" and you have been credited with $" . $publishercommission . ". NOTE: We do not tolerate SPAM and Invalid Activity.";
                    $Notify->type = "Campaign consumed";
                    $Notify->Notify_Receivers_Id = $advert->publisher_id;
                    $Notify->save();

                    // $PublisherMsg = "Dear " . $advert->publisher->name . ", your Promoted Campaign " . $advert->campaign->campaign_name . " from " . $advert->advertiser->name . " has just been patronize today at " . $startDate . " via your website " . $destUrl . ". NOTE: We do not tolerate SPAM and Invalid Activity on your Account.";

                    // if ($advert->publisher->login == "phone") {
                    //     $AccountSid = "AC68fde1a039c71651c8f132177287b3e9"; // Your Account SID from www.twilio.com/console
                    //     $AuthToken = "c047895b53559aaf20cd8036f294108c"; // Your Auth Token from www.twilio.com/console
                    //     $client = new \Services_Twilio($AccountSid, $AuthToken);

                    //     try {
                    //         // $Client_message = $client->account->messages->create(array(
                    //         //     "From" => "+12018856171", // From a valid Twilio number
                    //         //     "To" => $advert->publisher->phone, // Text this number
                    //         //     "Body" => $PublisherMsg,
                    //         // ));
                    //     } catch (\Services_Twilio_RestException $e) {
                    //     }
                    // } else {
                    //     // $email = $advert->publisher->email;
                    //     // $heading = "Campaign Consumed";
                    //     // $data['heading'] = $heading;
                    //     // $data['TextToClient'] = $PublisherMsg;
                    //     // Mail::send('email.campaignconsumed', $data, function ($message) use ($email) {
                    //     //     $message->from('info@adbirt.com', 'Adbirt');
                    //     //     $message->to($email)->subject('Campaign Consumed');
                    //     // });
                    // }

                    //process if campaign cost have been finished
                    //echo "*** price and remaiing price $price , $remainingAmt";

                    // if ($remainingAmt < $cost_per_action) {
                    if ($remainingAmt <= 0) {
                        $status['campaign_approval_status'] = "Pending";
                        Campaign::where('id', $advert->campaign_id)
                            ->update($status);

                        //send email
                        $email = $advert->advertiser->email;
                        $heading = "Funds exhausted, kindly top up your wallet";
                        $paymentMsg = "Dear " . $advert->advertiser->name . ", you do not have sufficient balance on your wallet. So your campaign has been stopped to continue kindly add fund on your wallet.";

                        $data['heading'] = $heading;
                        $data['TextToClient'] = $paymentMsg;
                        Mail::send('email.campaignconsumed', $data, function ($message) use ($email, $heading) {
                            $message->from('info@adbirt.com', 'Adbirt');
                            $message->to($email)->subject($heading);
                        });
                    }

                    $this->outputData['message'] = "Verified";
                    $this->outputData['status'] = 200;
                    return response()->json($this->outputData, 200);
                } else {
                    //change campaign status and send email to advertiser
                    $status['campaign_approval_status'] = "Pending";
                    Campaign::where('id', $advert->campaign_id)
                        ->update($status);

                    //send email
                    $email = $advert->advertiser->email;
                    $heading = "Funds exhausted, kindly top up your wallet";
                    $paymentMsg = "Dear " . $advert->advertiser->name . ", you do not have sufficient balance on your wallet. So your campaign has been discontinued. To continue, kindly add funds on your wallet.";

                    $data['heading'] = $heading;
                    $data['TextToClient'] = $paymentMsg;
                    Mail::send('email.campaignconsumed', $data, function ($message) use ($email, $heading) {
                        $message->from('info@adbirt.com', 'Adbirt');
                        $message->to($email)->subject($heading);
                    });

                    $this->outputData['message'] = "Unable to process campaign, not enough balance available";
                    return response()->json($this->outputData, 401);
                }

            } else {
                $this->outputData['message'] = "Spam click detected";
                return response()->json($this->outputData, 403);
            }
        } else {
            $this->outputData['message'] = "Invalid campaign";
            return response()->json($this->outputData, 405);
        }
    }

    public function checkIfUrlIsValidCampaign(Request $request)
    {
        $input = $request->all();

        $url_in_question = $input['url_in_question'];
        $url_type = 'success'; // 'landing' or 'success'

        if (isset($input['url_type'])) {
            $url_type = $input['url_type'];
        }

        $campaign = Campaign::where($url_type == 'landing' ? 'campaign_url' : 'campaign_success_url', 'like', '%' . $url_in_question . '%')->first();

        // $this->outputData['campaign'] = $campaign;
        $this->outputData['type'] = $url_type;
        $this->outputData['campaign'] = $campaign;

        if (is_null($campaign)) {
            $this->outputData['is_valid'] = false;
        } else {
            $this->outputData['is_valid'] = true;
        }

        return response()->json($this->outputData, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
