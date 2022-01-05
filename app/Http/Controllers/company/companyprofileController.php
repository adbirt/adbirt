<?php

namespace App\Http\Controllers\company;
use Auth;
use Illuminate\Http\Request;
use App\Model\companyprofile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class companyprofileController extends Controller
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
        $profile = companyprofile::where('user_id',Auth::user()->id)->first();
        if(!empty($profile)){
            $this->outputData['profileData'] = $profile;
        }
        return view('profile.company-profile',$this->outputData);
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
        $input = $request->all();
        
        if(isset($input['id'])){
            $Id = $input['id'];
            unset($input['id']);
            unset($input['_token']);
            
            if(isset($input['company_logo']) && !empty($input['company_logo'])){
                if(is_object($input['company_logo'])){
                    $fileOrgName = $input['company_logo'];
                    $fileOrgName = pathinfo($fileOrgName, PATHINFO_FILENAME);
                    $fileOrgName = preg_replace('/[^A-Za-z0-9\-._]/', '', $fileOrgName);
                    $fileExtension = $input['company_logo']->getClientOriginalExtension();
                    $fileName    = time().'.'.$fileExtension;
                    $arrFileDetail = $input['company_logo'];
                    $arrFileDetail->move('public/uploads/company_logo/', $fileName);
                    $input['company_logo'] = $fileName;
                }else{
                    $input['company_logo'] = $input['company_logo'];
                }
            }else{
                $input['company_logo'] = $input['old_company_logo'];
            }
            unset($input['old_company_logo']);
            companyprofile::where('id',$Id)->update($input);
            \Session::flash('flash_message',"Campaign Details Has Been Updated Successfully");   
        }else{
            $company_logo = $input['company_logo'];
            if(isset($company_logo) && !empty($company_logo)){
                if(is_object($company_logo)){
                    $fileOrgName = $company_logo;
                    $fileOrgName = pathinfo($fileOrgName, PATHINFO_FILENAME);
                    $fileOrgName = preg_replace('/[^A-Za-z0-9\-._]/', '', $fileOrgName);
                    $fileExtension = $company_logo->getClientOriginalExtension();
                    $fileName    = time().'.'.$fileExtension;
                    $arrFileDetail = $company_logo;
                    $arrFileDetail->move('public/uploads/company_logo/', $fileName);
                    $input['company_logo'] = $fileName;
                }else{
                    $input['company_logo'] = $company_logo;
                }
            }
            $input['user_id'] = Auth::user()->id;
            unset($input['_token']);
            $cp                 = new companyprofile;
            foreach ($input as $key => $value){
                $cp->$key  = strtolower(trim($value));
            }
            $cp->save();
            \Session::flash('flash_message',"Campaign Details Has Been Added Successfully");   
        }
        return redirect('/dashboard');
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
