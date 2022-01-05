<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactEmail as ContactEmail;

class PageController extends Controller {

    public function getContact()
    {
        return view('report')
		->with('title', 'Report User');
    }
    public function postContact(Request $request)
    {    
         $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|numeric',
            'message'=>'required|regex:/^[a-z0-9\040\.\,\'\-]+$/i'
        ]);
      ContactEmail::create($request->all());
       $notification = array(
            'message' => 'Thank you for Keeping the Community Safe from Aliens! We shall take Appropriate actions Immediately - Cyber Police Bot', 
            'alert-type' => 'success'
        );
       return redirect()->back()->with($notification);
    }
}