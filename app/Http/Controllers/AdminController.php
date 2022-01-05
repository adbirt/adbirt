<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Model\userModel;
use App\Model\rolesModel;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function home()
    {
        return view('home')
            ->with('title', 'Home');
    }


    public function contact()
    {
        return view('contact')
            ->with('title', 'Contact Us');
    }

    public function terms()
    {
        return view('terms')
            ->with('title', 'Terms');
    }

    public function privacy()
    {
        return view('privacy')
            ->with('title', 'Privacy');
    }


    public function howitworks()
    {
        return view('howitworks')
            ->with('title', 'How it works');
    }

    public function actionsandevents()
    {
        return view('actionsandevents')
            ->with('title', 'Actions and Events');
    }

    public function about()
    {
        return view('about')
            ->with('title', 'About Us');
    }


    public function pricing()
    {
        return view('pricing')
            ->with('title', 'Pricing');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $user_id = rolesModel::select('user_id')->where('role_id', '3')->get();
        $users_id = array();
        foreach ($user_id as $key => $value) {
            $users_id[] = $value['user_id'];
        }

        $users = User::whereIn('id', $users_id)->where('active', 1)->get();
        return view('client.users1')
            ->with('title', 'List of All Active Users')
            ->with('users', $users);
    }

    public function index2()
    {
        $user_id = rolesModel::select('user_id')->where('role_id', '3')->get();
        $users_id = array();
        foreach ($user_id as $key => $value) {
            $users_id[] = $value['user_id'];
        }
        $users = User::whereIn('id', $users_id)->where('active', 0)->get();
        return view('client.users2')
            ->with('title', 'List of All Inactive Users')
            ->with('users', $users);
    }
    public function index3()
    {
        $role_id = Role::where('name', config('customConfig.roles.user'))->pluck('id');
        $user_id = DB::table('role_user')->where('role_id', $role_id)->lists('user_id');
        $users2 = User::whereIn('id', $user_id)->get();

        // return $user3 =  $users->lists('country');
        $users = DB::table('users')
            ->select('country', DB::raw('COUNT(country) as total_country_users'))
            ->groupBy('country')
            ->get();

        return view('client.users3')
            ->with('title', 'List of All Users According to Country')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::findOrFail($id);
        return view('client.show')
            ->with('title', 'Show Details')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = [
            '1' => 'Active',
            '0' => 'Inactive'
        ];
        $user = User::findOrFail($id);
        return view('client.edit')
            ->with('title', 'Change the status of User')
            ->with('active', $active)
            ->with('user', $user);
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
        $data = $request->all();
        $user = User::findOrFail($id);
        if ($user->active == $data['active']) {
            return redirect()->back()->with('warning', 'The User is already in this state');
        } else {
            $user->active = $data['active'];
            $user->save();
            return redirect()->route('admin.allusers')->with('success', 'You have Successfully changed the status of the user');
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
        $data = $request->all();

        try {
            $del['active'] = '0';
            User::where('id', $data['id'])->update($del);
            return redirect()->route('admin.allusers')->with('success', 'User Deleted Successfully.');
        } catch (\Throwable $ex) {
            return redirect()->route('admin.allusers')->with('error', 'Something went wrong.Try Again.');
        }
    }
}
