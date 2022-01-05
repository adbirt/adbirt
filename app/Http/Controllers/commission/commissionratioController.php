<?php

namespace App\Http\Controllers\commission;

use Illuminate\Http\Request;
use App\Model\commissionratioModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class commissionratioController extends Controller
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
        //
        $rate = commissionratioModel::first();
        if (!empty($rate)){
            $this->outputData['ratioData'] = $rate;
        }
        return view('commission.commission-ratio',$this->outputData);
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
        $rate = commissionratioModel::first();
        if(!empty($rate)){
            unset($input['_token']);
            commissionratioModel::where('id','1')->update($input);
        }else{
            $ratio                   = new commissionratioModel;
            $ratio->admin_ratio      = $input['admin_ratio'];
            $ratio->publisher_ratio  = $input['publisher_ratio']; 
            $ratio->save();
        }
        return redirect('/commission-ratio');
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
