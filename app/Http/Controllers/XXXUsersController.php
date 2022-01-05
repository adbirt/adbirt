<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Validator;
use Auth;
use Hash;
use DB;
use Redirect;
use App\Role;
use Mail;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use View;

class XXXUsersController extends Controller
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
        return view('auth.register')
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
        $user->birthday = $data['birthday'];
        $user->country = $data['country'];
        $user->address = $data['address'];
        if ($user->save()) {
            $rand = str_random(6);
                // insert token for confirmation
                $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->save();
            DB::table('activate')->insert(
                    ['user_id' => $user->id, 'activation_key' => $rand]
                    );
                // assign User Role
                $user_role = Role::where('name', config('customConfig.roles.user'))->first();
            $user->attachRole($user_role);

            if ($user->login == 'email') {
                $email = $user->email;
                Mail::send('auth.mail', [ 'activation_key' => $rand ], function ($message) use ($email) {
                    $message->to($email)->subject('Account Activation || Inventory'); // it does not work except Input::get();
                });
                $txt = "<b>Your account has been created succesfully.</b><br>A confirmation email has been sent to <b>".$email."</b>. Please check your inbox or spam folder.";
                $flag = 1;
                $phone = '';
            } elseif ($user->login == 'phone') {
                $txt = "<b>Your account has been created succesfully.</b><br>A confirmation key has been sent to <b>".$user->phone."</b>. Please check your inbox.";
                $flag =2;
                $phone = $user->phone;
                $message = "Your virtual kingdom confirmation code is ".$rand;
                $test = urlencode($message); // must use to send this kind of messeage through url
                    // sms api
                    $url = "http://api.smartsmssolutions.com/smsapi.php?username=minisaving&password=love4ever&sender=VKingdom&recipient=".$phone."&message=".$test;

                $json = file_get_contents($url);
                $datas = json_decode($json, true);

                if ($datas == 2904) {
                    $text = 'Success';
                } else {
                    $text = 'Failed';
                }
                    // return redirect()->away($url, ['recipient' => $phone, 'message' => $message]);
            } else {
                $txt = "<b>One step away</b>";
                $flag =3;
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
        $key= Input::get('key');
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
        $gender = [ 'male' => 'male',
                    'female' => 'female'
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'country' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'state' => 'required',
            'profession' => 'required',
            'birthday' => 'required',
            'fb' => 'url',
            'twitter' => 'url',
            'gp' => 'url',
            'instagram' => 'url',
            'personal_site' => 'url',
            'aboutme' => 'url',
            'linkedin' => 'url',
            'pinterest' => 'url'

        ];

        $data= $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user = Auth::user();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->country = $data['country'];
        $user->birthday = $data['birthday'];
        $user->address = $data['address'];
        if ($user->save()) {
            $profile = Profile::find($user->id);
            if (count($profile) > 0) {
                $profile = new Profile();
                $profile->user_id = $user->id;
                $profile->gender = $data['gender'];
                $profile->city = $data['city'];
                $profile->state = $data['state'];
                $profile->profession = $data['profession'];
                $profile->aboutmyself = $data['aboutmyself'];
                $profile->fb = $data['fb'];
                $profile->twitter = $data['twitter'];
                $profile->gp = $data['gp'];
                $profile->instagram = $data['instagram'];
                $profile->personal_site = $data['personal_site'];
                $profile->aboutme = $data['aboutme'];
                $profile->linkedin = $data['linkedin'];
                $profile->pinterest = $data['pinterest'];
            //$profile = $user->profile()->save($profile);
            $profile->save();
            }
        } else {
            return redirect()->back()->withInput()->withInfo("Something went wrong. Please, try again");
        }
        return redirect()->route('profile')->withSuccess("Your Profile Succesfully Updated.");
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

            $validator = Validator::make([
            // here use the path to the uploaded Image
            'image' => $file ],
            [
                'image' => 'image'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors("Size too large or Invalid image");
            }

            $destination = public_path().'/uploads/propics/';
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move($destination, $filename);
            $propic = '/uploads/propics/'.$filename;
            DB::table('profiles')
                ->where('user_id', Auth::user()->id)
                ->update(['propic' => $propic]);
            return redirect()->route('profile')->withSuccess("Your Profile Picture Succesfully Updated.");
        } else {
            return redirect()->back()->withErrors("You did not select any photos");
        }
    }
}
