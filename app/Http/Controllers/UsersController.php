<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Model\rolesModel;
use App\Profile;
use App\Transaction;
use App\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Redirect;
use Validator;
use View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries_url = "https://adbirt.com/public/assets-revamp/new-auth/json/countries-states-cities.json";
        $countries_url = "https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries.json";

        $curl = curl_init($countries_url);
        curl_setopt($curl, CURLOPT_URL, $countries_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        $countries = json_decode($resp, true);

        $mapped_countries = [];
        $mapped_phone_codes = [];

        for ($i = 0; $i < count($countries); $i++) {
            $current_country = $countries[$i];

            $mapped_countries[$current_country['name']] = $current_country['emoji'] . ' ' . $current_country['name'];
            $mapped_phone_codes[$current_country['name']] = '+' . $current_country['phone_code'];
        }

        return view('auth.register', [
            'countries' => $countries,
            'mapped_countries' => $mapped_countries,
            'mapped_phone_codes' => $mapped_phone_codes,
        ])
            ->with('title', 'Register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $user = new User;
        $user->name = $data['name'];
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
        // $user->birthday = $data['birthday'];
        $user->country = $data['country'];
        $user->city = $data['city'];
        // $user->address = $data['address'];

        $saved = $user->save();

        $Id = $user->id;

        if ($saved) {
            $role = new rolesModel;
            $role->user_id = $Id;
            if ($data['Role'] == 'vendor') {
                $role->role_id = "2";
            } elseif ($data['Role'] == 'client') {
                $role->role_id = "3";
            }
            $role->save();

            $Trans = new Transaction;
            $Trans->user_id = $Id;
            $Trans->amount = 0;
            $Trans->method_id = 1;
            $Trans->save();

            $Pro = new Profile;
            $Pro->user_id = $Id;
            $Pro->propic = "https://adbirt.com/public/assets-revamp/img/avatar.png";
            $Pro->save();

            $rand = mt_rand(1000000, 9999999);
            // insert token for confirmation
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->save();

            DB::table('activate')->insert(
                ['user_id' => $user->id, 'activation_key' => $rand]
            );

            $flag = 0;
            $txt = '';
            $phone = '';

            if ($user->login == 'email') {
                $email = $user->email;
                /* Mail::send('auth.mail', [ 'activation_key' => $rand ], function ($message) use ($email) {
                $message->to($email)->subject('Account Activation'); // it does not work except Input::get();
                });*/
                $input['rand'] = $rand;
                Mail::send('email.confirmation', $input, function ($message) use ($email) {
                    $message->from('info@adbirt.com', 'Adbirt');
                    $message->to($email)->subject('Account Activation');
                });

                $txt = "<b>Your account has been created succesfully.</b><br>A confirmation email has been sent to <b>" . $email . "</b>. Please check your inbox or spam folder.";
                $flag = 1;
                $phone = '';
            } elseif ($user->login == 'phone') {
                // require "/path/to/twilio-php/Services/Twilio.php";

                //     $AccountSid = "AC68fde1a039c71651c8f132177287b3e9"; // Your Account SID from www.twilio.com/console
                //     $AuthToken = "c047895b53559aaf20cd8036f294108c";   // Your Auth Token from www.twilio.com/console

                //     $client = new \Services_Twilio($AccountSid, $AuthToken);

                //     // Display a confirmation message on the screen
                //     // echo "Sent message {$message->sid}";

                //     $txt = "<b>Your account has been created succesfully.</b><br>A confirmation key has been sent to <b>".$user->phone."</b>. Please check your message inbox.";
                // $flag =2;
                // $phone = $user->phone;
                // $messageToShow = "Your Adbirt verification code is ".$rand;
                //     //$test = urlencode($message); // must use to send this kind of messeage through url
                //     // sms api

                //     try {
                //         $message = $client->account->messages->create(array(
                //             "From" => "+12018856171", // From a valid Twilio number
                //             "To" => $phone,   // Text this number
                //             "Body" => $messageToShow,
                //         ));
                //     } catch (Services_Twilio_RestException $e) {
                //         return $e->getMessage();
                //     }

                //return $message->sid;
                // return redirect()->away($url, ['recipient' => $phone, 'message' => $message]);
            } else {
                $txt = '<b>One step away</b>';
                $flag = 3;
                $phone = '';
            }

            // return $phone;
            // return $flag;
            return redirect()->route('activation')
                ->with('title', 'Activation')
                ->with('success1', $txt)
                ->with('phone', $phone)
                ->with('login_type', $flag);
        }
    }

    public function activate(Request $request)
    {
        $login_type = ($request->session()->get('login_type') == null) ? 2 : $request->session()->get('login_type'); // getting the values from session
        $phone = ($request->session()->get('phone') == null) ? '' : $request->session()->get('phone');
        return view('auth.activation')
            ->with('title', 'Activation')
            ->with('phone', $phone)
            ->with('login_type', $login_type);
    }

    public function doActivate()
    {
        // $request->all();
        // $key = $request->input['key'];
        $key = Input::get('key');
        if (DB::table('activate')->where('activation_key', $key)->exists()) {
            $user_id = DB::table('activate')->where('activation_key', $key)->pluck('user_id');
            $user = User::find($user_id);
            $user->active = 1;
            $user->save();
            DB::table('activate')
                ->where('user_id', $user_id)
                ->update(['activation_key' => 'activated']);
            return redirect()->route('login')
                ->with('success', "Your registration is confirmed. Please, Log in Now");
        } else {
            return redirect()->back()->with('error', 'Token Mismatch.');
        }
    }

    /**
     * Display the profile Info.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // return $user = User::with('profile')->where('id', Auth::user()->id)->first();
        $noty = Profile::noty();
        return view('auth.profile')
            ->with('title', 'Profile')
            ->with('info', $noty)
            ->with('user', Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $user = User::finfOrFail($id);
    //     return view('client.show')
    //                 ->with('title', 'Show Details')->with('user', $user);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::with('profile')->where('id', Auth::user()->id)->first();
        $gender = [
            'male' => 'male',
            'female' => 'female',
        ];
        $profile = Auth::user()->profile;
        return view('user.edit-profile')
            ->with('title', 'Edit Profile')
            ->with('user', $user)
            ->with('gender', $gender)
            ->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'country' => 'required',
            'gender' => 'required',
            /* 'birthday' => 'required'
        'fb' => 'url',
        'twitter' => 'url',
        'gp' => 'url',
        'instagram' => 'url',
        'personal_site' => 'url',
        'aboutme' => 'url',
        'linkedin' => 'url',
        'pinterest' => 'url' */
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->country = $data['country'];
        // $user->birthday = $data['birthday'];
        $user->address = $data['address'];

        if ($user->save()) {
            $profile_id = $user->id;
            $profile = Profile::find($profile_id);
            if (!isset($profile) || empty($profile)) {
                $profile = new Profile;
            }
            $profile->gender = $data['gender'];
            $profile->city = $data['city'];
            $profile->profession = $data['profession'];
            $profile->state = $data['state'];
            $profile->aboutmyself = $data['aboutmyself'];
            $user->profile()->save($profile);
            /* $profile->fb = $data['fb'];
        $profile->twitter = $data['twitter'];
        $profile->gp = $data['gp'];
        $profile->instagram = $data['instagram'];
        $profile->personal_site = $data['personal_site'];
        $profile->aboutme = $data['aboutme'];
        $profile->linkedin = $data['linkedin'];
        $profile->pinterest = $data['pinterest'];
        $profile = $user->profile()->save($profile);
        $profile->save(); */
        } else {
            return redirect()->back()->withInput()->withInfo("Something went wrong. Please, try again");
        }
        return redirect()->route('profile')->withSuccess("Your Profile has been Updated Succesfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photoUpdate(Request $request)
    {
        if ($request->hasFile('propic')) {
            $file = $request->file('propic');

            $validator = Validator::make(
                [
                    // here use the path to the uploaded Image
                    'image' => $file,
                ],
                [
                    'image' => 'image',
                ]
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors("Size too large or Invalid image");
            }

            $destination = public_path() . '/uploads/propics/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destination, $filename);
            $propic = '/uploads/propics/' . $filename;
            DB::table('profiles')
                ->where('user_id', Auth::user()->id)
                ->update(['propic' => $propic]);
            return redirect()->route('profile')->withSuccess("Your Profile Picture has been Updated Succesfully.");
        } else {
            return redirect()->back()->withErrors("You did not select any photos");
        }
    }
}
