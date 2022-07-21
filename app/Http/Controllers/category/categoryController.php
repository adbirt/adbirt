<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\category;
use App\Http\Controllers\Controller;

class categoryController extends Controller
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
        $category = category::where('isDeleted','No')->get();
        $this->outputData['categoryData'] = $category;
        
        if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('client')) {
        return view('category.view-category',$this->outputData);
        }


        return view('category.view-category-new',$this->outputData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.add-category',$this->outputData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id="")
    {
        //
        $input = $request->all();
        if(!empty($id)){
            $Id = base64_decode($id);
            $arrcategory = category::find($Id);
            $this->outputData['categoryData'] = $arrcategory;
            return view('category.add-category',$this->outputData);
        }else{
            if(isset($input['id'])){
                $input['category_name'] = strtolower(trim($input['category_name']));
                $Id = $input['id'];
                unset($input['id']);
                unset($input['_token']);
                unset($input['old_category_name']);            
                category::where('id',$Id)->update($input);
                \Session::flash('flash_message',"Category details has been updated successfully");   
            }else{
                $owner                 = new category;
                $owner->category_name  = strtolower(trim($input['category_name']));
                $owner->save();
                \Session::flash('flash_message',"Category details has been added successfully");   
            }
            return redirect('/campaigns-category/view-campaigns-category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        //
        $input = $request->all();
        $category = category::find($input['id']);
        
        if($category->isActive == "Active" ){
            $status['isActive'] = "InActive";
        }else{
            $status['isActive'] = "Active";
        }

        category::where('id',$input['id'])->update($status);

        if($category->isActive == "Active" ){
            echo "inactive";
            die;
        }else{
            echo "active";
            die;
        }
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
    public function check(Request $request)
    {
        //
        $input = $request->all();
        if(isset($input['action']) && $input['action'] == 'edit'){
            if( strtolower($input['old_category_name']) === strtolower($input['category_name']) ){
                echo "true";
                die;
            }else{
                $arrCat = category::where('category_name',$input['category_name'] )
                                    ->where('isActive','Active')
                                    ->count();
                if($arrCat > 0){
                    echo "false";
                    die;
                }else{
                    echo "true";
                    die;
                }
            }
        }else{
            $arrCat = category::where('category_name',$input['category_name'] )
                                ->where('isActive','Active')
                                ->count();
            if($arrCat > 0){
                echo "false";
                die;
            }else{
                echo "true";
                die;
            }
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
        //
        $input = $request->all();
        $Id = $input['id'];
        $del['isDeleted'] = 'Yes';
        category::where('id',$Id)->update($del);
        echo "true";
        die;
    }
}
