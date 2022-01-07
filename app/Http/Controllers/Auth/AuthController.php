<?php

namespace app\Http\Controllers\Auth;

use Input;
use App\PasswordReset;
use Validator;
use Auth;
use Mail;
use View;
use Hash;
use App\User;
use App\Transaction;
use App\Model\campaign;
use App\Model\campaignorders;
use App\Model\campaignTransaction;
use App\Model\rolesModel;
use App\Model\WalletHistoryModel;
// use App\Model\companyprofile;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    public function __construct()
    {
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:20|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function login()
    {
        // return 'Auth Login Panel';
        //Auth::logout();
        return view('auth.login')
            ->with('title', 'Login');
    }

    public function doLogin(Request $request)
    {
        Auth::logout();
        $rules = array(
            'email'    => 'required',
            'password' => 'required'
        );
        $allInput = $request->all();

        $validation = Validator::make($allInput, $rules);

        $is_remote_request = false;
        if (isset($allInput['is_remote_request']) && $allInput['is_remote_request'] ==  'true') {
            $is_remote_request = true;
        }

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {

            if ($is_remote_request) {
                return response()->json(['status' => 400, 'message' => "Too many login attempts, you've been locked out temporarily!"]);
            }

            return $this->sendLockoutResponse($request);
        }

        $login = ltrim($allInput['email'], '+');
        if (is_numeric($login)) {
            if (User::where('phone', $login)->where('active', 0)->exists()) {
                return $allInput['email'];

                if ($is_remote_request) {
                    return response()->json(['status' => 300, 'message' => 'Your mobile number has been registered. Please, confirm your account by activation code sent to your mobile.']);
                }

                return redirect()->route('activation')
                    ->with('title', 'Activation')
                    ->with('success1', 'Your mobile number has been registered. Please, confirm your account by activation code sent to your mobile.')
                    ->with('phone', $allInput['email'])
                    ->with('login_type', 2);
            } elseif (User::where('phone', $login)->where('active', 2)->exists()) {

                if ($is_remote_request) {
                    return response()->json(['status' => 300, 'message' => 'We are Sorry, Your Account has been Deactivated.']);
                }

                return redirect()->route('login')
                    ->with('error', 'We are Sorry, Your Account has been Deactivated.');
            }
        } elseif (User::where('email', $allInput['email'])->where('active', 0)->exists()) {

            if ($is_remote_request) {
                return response()->json(['status' => 300, 'message' => 'Your email is already registered. Please, confirm your account by activation link sent to your email.']);
            }

            return redirect()->route('activation')
                ->with('title', 'Activation')
                ->with('success1', 'Your email is already registered. Please, confirm your account by activation link sent to your email.')
                ->with('phone', '')
                ->with('login_type', 1);
        } elseif (User::where('email', $allInput['email'])->where('active', 2)->exists()) {

            if ($is_remote_request) {
                return response()->json(['status' => 300, 'message' => 'We are Sorry, Account has been Deactivated.']);
            }

            return redirect()->route('login')
                ->with('error', 'We are Sorry, Account has been Deactivated.');
        }

        if ($validation->fails()) {

            if ($is_remote_request) {
                return response()->json(['status' => 400, 'message' => 'Username or Password missing or incorrect.']);
            }

            return redirect()->route('login')
                ->withInput()
                ->withErrors($validation);
        } else {
            $remember = ($request->has('remember')) ? true : false;

            $credentials = array(
                'email'    => $allInput['email'],
                'password' => $allInput['password'],
                'active'   => 1
            );

            if (Auth::attempt($credentials, $remember)) {
                if ($throttles) {
                    $this->clearLoginAttempts($request);
                }

                if ($is_remote_request) {
                    $currentuser = Auth::user();
                    return response()->json(['status' => 200, 'message' => 'Login Successful.', 'payload' => $currentuser]);
                }

                return redirect()->intended('dashboard');
            } elseif (Auth::attempt(['phone' => $allInput['email'], 'password' => $allInput['password'], 'active' => 1], $remember)) {
                if ($throttles) {
                    $this->clearLoginAttempts($request);
                }

                if ($is_remote_request) {
                    $currentuser = Auth::user();
                    return response()->json(['status' => 200, 'message' => 'Login Successful.', 'payload' => $currentuser]);
                }

                return redirect()->intended('dashboard');
            } else {
                if ($throttles) {
                    $this->incrementLoginAttempts($request);
                }

                if ($is_remote_request) {
                    return response()->json(['status' => 400, 'message' => 'Error in Email Address or Password.']);
                }

                return redirect()->route('login')
                    ->withInput()
                    ->withErrors('Error in Email Address or Password.');
            }
        }

        if ($is_remote_request) {
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }

        return 'Something went wrong!';
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')
            //return redirect(\URL::previous())
            ->with('success', "You've logged out successfully!'.");
        // return 'Logout Panel';
    }

    public function convertCurrency($amount, $from, $to)
    {
        $data = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from&to=$to");
        preg_match("/<span class=bld>(.*)<\/span>/", $data, $converted);

        $converted = preg_replace("/[^0-9.]/", "", $converted['1']);
        return number_format(round($converted, 3), 2);
    }

    public function dashboard()
    {

        $totalClient = count(rolesModel::with('GetClient')->where('role_id', '3')->get());

        $arrAllClient = rolesModel::with('GetClient')->where('role_id', '3')->get();
        $emailCount = 0;
        $phoneCount = 0;
        foreach ($arrAllClient as $key => $value) {
            if ($value->GetClient->login == "email") {
                $emailCount += 1;
            } else {
                $phoneCount += 1;
            }
        }
        $activeClient = 0;
        foreach ($arrAllClient as $key => $value) {
            if ($value->GetClient->active == "1") {
                $activeClient += 1;
            }
        }
        $NonActiveClient = 0;
        foreach ($arrAllClient as $key => $value) {
            if ($value->GetClient->active == "0") {
                $NonActiveClient += 1;
            }
        }

        $clientId = rolesModel::select('user_id')->where('role_id', "3")->get();

        foreach ($clientId as $key => $value) {
            $ClientAmt[] = Transaction::select('amount')->where('user_id', $value->user_id)->get();
        }

        $VendorId = rolesModel::select('user_id')->where('role_id', "2")->get();

        foreach ($VendorId as $key => $value) {
            $VendorAmt[] = Transaction::select('amount')->where('user_id', $value->user_id)->get();
        }

        $TotalVendorAmt = 0;
        if (isset($VendorAmt)) {
            foreach ($VendorAmt as $key => $value) {
                if (isset($value) && count($value) > 0) {
                    //print_r($key);
                    //echo " value is  $value";	
                    foreach ($value as $val) {
                        $TotalVendorAmt += $val['amount'];
                    }
                }
            }
        }

        $TotalClientAmt = 0;
        if (isset($ClientAmt)) {
            foreach ($ClientAmt as $key => $value) {
                if (isset($value) && count($value) > 0) {
                    foreach ($value as $val) {
                        $TotalClientAmt += $val['amount'];
                    }
                    //$TotalClientAmt+= $value['0']['amount']; 
                }
            }
        }

        $TotalAmt = $TotalVendorAmt + $TotalClientAmt;

        // vendors Statastics

        $totalVendors = count(rolesModel::with('GetOwner')->where('role_id', '2')->get());

        $Vendors = rolesModel::select('user_id')->where('role_id', '2')->get();
        if (isset($Vendors)) {
            foreach ($Vendors as $key => $value) {
                $city[] = User::select('city')->where('id', $value->user_id)->get()->toArray();
            }
        }

        $arrvendorsCity = array();
        if (isset($city)) {
            foreach ($city as $key => $value) {
                $citys = User::where('city', $value['0']['city'])->count();

                $arrvendorsCity[$value['0']['city']] = $citys;
            }
        }

        //$TotalRevenue = WalletHistoryModel::where('user_id','1')->where('mode','!=','WalletCredit')->sum('amount');
        $TotalRevenue = WalletHistoryModel::where('user_id', '1')->where('mode', '!=', 'WalletCredit')->sum('commision');


        //adding commision in total deposit fund
        $TotalAmt = $TotalAmt + $TotalRevenue;

        //updated code for total profit calculation
        //$TotalProfit = WalletHistoryModel::where('user_id','1')->sum('commision');
        $TotalProfit =  WalletHistoryModel::where('mode', '=', 'credit')->sum('amount');

        $ActiveAd = 0;
        $Impressions = 0;
        $Clicks = 0;
        $Leads = 0;

        if (Auth::user()->hasRole('vendor')) {
            // $myPro = companyprofile::where('user_id', Auth::user()->id)->first();

            // if (empty($myPro)) {
            //     \Session::flash('Error_message', "Set Your Company Profile first");
            // }

            $totalCampsByVenodr = campaignorders::with('campaign')
                ->where('advertiser_id', Auth::user()->id)
                ->where('campaign_running_status', 'activated')
                ->count();

            $totalImpressionsByVenodr = campaign::where('advertiser_id', Auth::user()->id)
                ->sum('campaign_view');

            $totalClicksByVenodr = campaign::where('advertiser_id', Auth::user()->id)
                ->sum('campaign_click');

            $totalLeadsByVendor = campaignTransaction::where('advertiser_id', Auth::user()->id)->count();

            $ActiveAd = $totalCampsByVenodr;
            $Impressions = $totalImpressionsByVenodr;
            $Clicks = $totalClicksByVenodr;
            $Leads = $totalLeadsByVendor;
        }

        if (Auth::user()->hasRole('client')) {


            $totalCampsByClient = campaignorders::with('campaign')
                ->where('publisher_id', Auth::user()->id)
                ->where('campaign_running_status', 'activated')
                ->count();


            $campaignorders_data = campaignorders::with('campaign')->where('publisher_id', Auth::user()->id)->get();
            $totalImpressionsByClient = 0;
            $totalClicksByClient = 0;
            if (count($campaignorders_data) > 0) {
                foreach ($campaignorders_data as $key => $value) {
                    $totalImpressionsByClient += $value->campaign->campaign_view;
                    $totalClicksByClient += $value->campaign->campaign_click;
                }
            }

            $totalLeadsByClient = campaignTransaction::where('publisher_id', Auth::user()->id)->count();

            $ActiveAd = $totalCampsByClient;
            $Impressions = $totalImpressionsByClient;
            $Clicks = $totalClicksByClient;
            $Leads = $totalLeadsByClient;
        }

        $totalCamps = count(campaign::where('campaign_approval_status', 'Approved')->get());

        $totalCampsCost = campaign::where('campaign_approval_status', 'Approved')->sum('campaign_cost_per_action');

        $totalSuccessCamps = count(campaignorders::where('campaign_running_status', 'activated')->get());

        $totalSuccessCampsCost = campaignorders::where('campaign_running_status', 'activated')->sum('campaign_price');


        return view('dashboard')
            ->with('title', 'Dashboard')
            ->with('user', Auth::user())
            ->with('totalClient', $totalClient)
            ->with('totalVendors', $totalVendors)
            ->with('emailCount', $emailCount)
            ->with('phoneCount', $phoneCount)
            ->with('activeClient', $activeClient)
            ->with('NonActiveClient', $NonActiveClient)
            ->with('TotalAmt', $TotalAmt)
            ->with('arrvendorsCity', $arrvendorsCity)
            ->with('totalCamps', $totalCamps)
            ->with('totalCampsCost', $totalCampsCost)
            ->with('totalSuccessCamps', $totalSuccessCamps)
            ->with('totalSuccessCampsCost', $totalSuccessCampsCost)
            ->with('TotalRevenue', $TotalRevenue)
            ->with('TotalProfit', $TotalProfit)
            ->with('ActiveAd', $ActiveAd)
            ->with('Impressions', $Impressions)
            ->with('Clicks', $Clicks)
            ->with('Leads', $Leads);
        // return 'Dashboard';
    }

    public function changePassword()
    {
        return view('auth.changePassword')
            ->with('title', "Change Password")->with('user', Auth::user());
        // return 'Change Password';
    }

    public function doChangePassword(Request $request)
    {
        $rules = [
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            $user = Auth::user();
            $user->password = Hash::make($data['password']);

            if ($user->save()) {
                Auth::logout();
                return redirect()->route('login')
                    ->with('success', 'Your password changed successfully.');
            } else {
                return redirect()->route('dashboard')
                    ->with('error', "Something went wrong.Please Try again.");
            }
        }
        // return 'Do Change Password';
    }
    public function resetRequest()
    {
        $rules = [
            'email' => 'required'
        ];

        $data = Input::all();
        $validator = Validator::make($data, $rules);

        // handles if validation fails

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $phone = ltrim($data['email'], '+');
        $provided = $data['email'];

        if (is_numeric($phone)) {
            if (User::where('phone', $provided)->exists()) {
                $token = mt_rand(1000000, 9999999);
                $user = new PasswordReset();
                $user->email = $provided;
                $user->token = $token;
                $user->save();
                $phone = '+' . $phone;
                // $message = "Your Virtual Kingdom Password Reset Code is ".$token;
                // $test = urlencode($message);
                // $url = "https://api.smartsmssolutions.com/smsapi.php?username=minisaving&password=love4ever&sender=VKingdom&recipient=".$provided."&message=".$test;

                // $json = file_get_contents($url);
                // $datas = json_decode($json, true);
                $AccountSid = "AC68fde1a039c71651c8f132177287b3e9"; // Your Account SID from www.twilio.com/console
                $AuthToken = "c047895b53559aaf20cd8036f294108c";   // Your Auth Token from www.twilio.com/console

                $client = new \Services_Twilio($AccountSid, $AuthToken);



                // Display a confirmation message on the screen
                // echo "Sent message {$message->sid}";



                // $txt = "<b>Your account has been created succesfully.</b><br>A confirmation key has been sent to <b>".$user->phone."</b>. Please check your inbox.";
                // $flag =2;
                // $phone = $user->phone;
                $messageToShow = "Your Adbirt Password Reset Code is " . $token;
                //$test = urlencode($message); // must use to send this kind of messeage through url
                // sms api

                try {
                    $message = $client->account->messages->create(array(
                        "From" => "+12018856171", // From a valid Twilio number
                        "To" => $phone,   // Text this number
                        "Body" => $messageToShow,
                    ));
                } catch (\Services_Twilio_RestException $e) {
                    return $e->getMessage();
                }
                return view('auth.resetPhone')
                    ->with('title', 'Reset Password')
                    ->with('success1', 'A Password Reset Code has been sent to ' . $provided . '. Please, insert it below')
                    ->with('phone', $provided);
            } else {
                return Redirect::route('register')->with('error', 'Sorry, Your phone does not exist');
            }
        } elseif (User::where('email', $provided)->exists()) {
            $token = str_random(25);
            $user = new PasswordReset();
            $user->email = $provided;
            $user->token = $token;
            $user->save();
            $reset_url = route('reset-page', ['reset' => $token]);
            Mail::send('emails.reset', ['url' => $reset_url], function ($message) {
                $message->to(Input::get('email'))->subject('Password Reset'); // it does not work except Input::get();
            });
            return Redirect::route('login')->with('success', 'An email has been sent to your email address. Please, follow the link.');
        } else {
            return Redirect::route('register')->with('error', 'Sorry, Your email does not exist');
        }
    }

    // processing reset request
    // reset page
    public function resetPage()
    {
        try {
            $reset_code = Input::get('reset');
            if (PasswordReset::where('token', $reset_code)->exists()) {
                return View::make('auth.reset')
                    ->with('title', 'Reset Your Password')
                    ->with('token', $reset_code);
            } else {
                return Redirect::route('login')->with('error', 'Your password reset request expired.Please, try again.');
            }
        } catch (\Exception $ex) {
            return Redirect::route('login')->with('error', 'Something went wrong. Please, try again.');
        }
    }
    // with phone
    public function resetPagePhone()
    {
        try {
            $phone = Input::get('phone');
            $token = Input::get('key');
            if (PasswordReset::where('token', $token)->where('email', $phone)->exists()) {
                return View::make('auth.reset')
                    ->with('title', 'Reset Your Password')
                    ->with('token', $token);
            } else {
                return Redirect::route('login')->with('error', 'Your password reset request expired.Please, try again.');
            }
        } catch (\Exception $ex) {
            return Redirect::route('login')->with('error', 'Something went wrong. Please, try again.');
        }
    }

    // changing password
    public function resetProcess()
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];

        $data = Input::all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $email = $data['email'];
        if (User::where('email', $email)->exists()) {
            $user_id = User::where('email', $email)->pluck('id');
            $user = User::find($user_id);
            $user->password = Hash::make($data['password']);
            $user->save();
        } elseif (User::where('phone', $email)->exists()) {
            $user_id = User::where('phone', $email)->pluck('id');
            $user = User::find($user_id);
            $user->password = Hash::make($data['password']);
            $user->save();
        } else {
            return redirect()->back()->withInput()->withErrors('Please, provide valid data');
        }
        // grab token from hidden field
        $reset_id = PasswordReset::where('token', $data['token'])->pluck('id');
        $password_reset = PasswordReset::find($reset_id); // a single object
        $counter = $password_reset->counter; // check previous counter
        // update


        try {
            $password_reset->token = null;
            $password_reset->counter = $counter + 1;
            $password_reset->user_id = $user_id;
            $password_reset->save();
            return Redirect::route('login')->with('success', 'Your Password has been reset succesfully.You can login now');
        } catch (\Exception $ex) {
            return Redirect::route('login')->with('error', 'Something went wrong. Please, try again.');
        }
    }
}
