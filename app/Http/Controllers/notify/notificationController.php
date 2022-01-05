<?php

namespace App\Http\Controllers\notify;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\NotificationAlertModel;

class notificationController extends Controller
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

    public function ChngeStatus(Request $request)
    {
        //
        $input = $request->all();
        $Id = $input['id'];
        if($Id== "Chnge"){
            $status['status'] = 'Seen';
            NotificationAlertModel::where('Notify_Receivers_Id',Auth::user()->id)->update($status);    
            echo "true";
            die;
        }else{
            $status['status'] = 'Seen';
            NotificationAlertModel::where('id',$Id)
                                 ->update($status);
            echo "true";
            die;
        }
    }

    public function notify()
    {

        $arrNotify = NotificationAlertModel::where('Notify_Receivers_Id',Auth::user()->id)
                                             ->orderBy('id','desc')
                                             ->paginate(5);
        $this->outputData['arrNotify'] = $arrNotify;                                       

        return view('notifications.notify',compact('arrNotify'));
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
