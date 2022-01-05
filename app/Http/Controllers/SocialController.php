<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Input;
use Illuminate\Http\Request;
use OAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\User;
use Auth;
use Session;

class SocialController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return Redirect::route('user');
    }




    public function show()
    {
        $data = array();

        if (Auth::check()) {
            $data = Auth::user();
        }
        return View::make('user', array('data'=>$data));
    }







//complete
    public function loginWithFacebook()
    {
        $code = \Input::get('code');

        $fb = \OAuth::consumer('Facebook');

        if (!empty($code)) {
            try {
                $token = $fb->requestAccessToken($code);

                $result = json_decode($fb->request('/me?fields=id,name,first_name,last_name,email,picture,gender'), true);
            } catch (Exception $e) {
                die("Too many requests, access denied by Facebook. Please wait a while.");
            }


            $profile = User::where('email', '=', $result['email'])->first();

            if (empty($profile)) {
                $user = new User;
                $user->name = $result['last_name'];
                $user->email = $result['email'];
                $user->password = Hash::make($result['id']);
                $user->save();
            }
            $profile = User::where('email', '=', $result['email'])->first();
            $user = $profile->id;
            \Auth::loginUsingId($user);
            Session::put('email', Auth::user()->email);

            return Redirect::to('/')->with('message', 'Logged in with Facebook');
        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to((string)$url);
        }
    }








    public function loginWithGoogle()
    {
        $code = Input::get('code');
        $googleService = OAuth::consumer('Google');

        if (!empty($code)) {
            try {
                $token = $googleService->requestAccessToken($code);

                $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

                // return $result;
            } catch (Exception $e) {
                die("Too many requests, access denied by Google. Please wait a while.");
            }

            $profile = User::where('email', '=', $result['email'])->first();
            if (empty($profile)) {
                $user = new User;
                $user->name = $result['family_name'];
                $user->email = $result['email'];
                $user->password = Hash::make($result['id']);
                $user->save();
            }

            $profile = User::where('email', '=', $result['email'])->first();
            $user = $profile->id;
            \Auth::loginUsingId($user);
            Session::put('email', Auth::user()->email);
            return Redirect::to('/')->with('message', 'Logged in with Google');
        }

        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Redirect::to((string)$url);
        }
    }
}
