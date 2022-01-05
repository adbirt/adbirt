<?php

namespace app\Http\Controllers;

use App\Product;
use App\ProductPurchase;
use App\Transaction;
use Illuminate\Http\Request;
use App\Model\rolesModel;
use App\Model\categoryModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use Auth;

class ProductController extends Controller
{
  public function view()
  {
    if(Auth::user()->hasRole('vendor') || Auth::user()->hasRole('client') ){
     $products = Product::where('product_approval_status','Approved')
                         ->where('isDeleted','No')
                         ->orderBy('id','desc')
                         ->paginate(4);

     $arrVendor = rolesModel::with('GetVendor')
                             ->where('role_id',"2")
                             ->get();               
     $this->outputData['arrVendor'] = $arrVendor;

     $arrCatgry = categoryModel::where('isDeleted','No')
                               ->orderBy('id','desc')
                               ->get();
     $this->outputData['arrCatgry'] = $arrCatgry; 
     
     $MaxPrice = Product::where('product_approval_status','Approved')->where('isDeleted','No')->max('product_price');
     
     $MinPrice = Product::where('product_approval_status','Approved')->where('isDeleted','No')->min('product_price');
     
     $this->outputData['MaxPrice'] = $MaxPrice;
     
     $this->outputData['MinPrice'] = $MinPrice;                       

     return view('product.view',$this->outputData,compact('products'))
     ->with('title', 'All Products List'); 
   }else{
    $products = Product::where('isDeleted','No')->orderBy('id','desc')->paginate(4);
    
    $arrVendor = rolesModel::with('GetVendor')
                            ->where('role_id',"2")
                            ->get();               
    $this->outputData['arrVendor'] = $arrVendor;

    $arrCatgry = categoryModel::where('isDeleted','No')
                               ->orderBy('id','desc')
                               ->get();
     $this->outputData['arrCatgry'] = $arrCatgry; 

    $MaxPrice = Product::where('isDeleted','No')->max('product_price');

    $MinPrice = Product::where('isDeleted','No')->min('product_price');

    $this->outputData['MaxPrice'] = $MaxPrice;

    $this->outputData['MinPrice'] = $MinPrice;                        

    return view('product.view',$this->outputData,compact('products'))
    ->with('title', 'All Products List');
  }
}

public function edit($id)
{
 $product=Product::find($id);
 return view('product.edit',compact('product'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */

public function show($id)
{
 $product=Product::find($id);
 return view('product.show',compact('product'));
} 

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
/*public function store()
{
   $product=Request::all();
   Product::create($product);
   return redirect('product');
 }*/



/*public function store(Request $request)
{
$product=$request->all(); // important!!
Product::create($product);
return redirect('product/view');
}*/

public function store(Request $request)
{

  $product = new Product(array(
    'pro_name' => $request->get('pro_name'),
    'pro_des' => $request->get('pro_des'),
    'pro_price' => $request->get('pro_price')
    ));

  $product->save();

  $imageName = $product->pro_name . '.' . 
  $request->file('image')->getClientOriginalExtension();

  $request->file('image')->move(
    base_path() . '/public/images/catalog/', $imageName
    );

  return \Redirect::route('product.view', 
    array($product->id))->with('message', 'Product added!');    
}




public function update($id)
{

  $validator = Validator::make(Input::all(), Product::$rules);


  if ($validator->fails()) {
    return Redirect::back()->withErrors($validator);

  }

  else {
    $product = Product::find($id);
    $product->pro_name = Input::get('pro_name');
    $product->pro_des = Input::get('pro_des');
    $product->pro_price = Input::get('pro_price');
    $product->pro_pics = Input::get('pro_pics');
           // $books->phone  = Input::file('image');
    $product->save();

    return Redirect::route('product.view');
  }
}




public function destroy($id)
{
 Product::find($id)->delete();
 return redirect('product/view');
}


public function create()
{
 return view('product.create');
}







public function buy($id)
{
  $pro = Product::where('id', $id)->first();
  $balance = Transaction::where('user_id', \Auth::user()->id)->sum('amount');
  $productAmount = ProductPurchase::where('user_id', \Auth::user()->id)->sum('amount');
  $sum = $balance - $productAmount;


  if ($sum >= $pro->pro_price) {
    $product = new ProductPurchase();

    $product->amount = $pro->pro_price;
    $product->product_id = $pro->id;
    $product->product_quantity = 1;
    $product->user_id = \Auth::user()->id;

    if ($product->save()) {
      return redirect()->route('product.view')->with('success', 'Thank you for Paying for this Service, your Service Provider will get in touch with you soon.');
    } else {
      return redirect()->route('product.view')->with('error', 'Something went wrong');
    }
  } else {
    return redirect()->route('product.view')->with('error', 'Sorry, You do not have sufficient Funds to Pay for this Service.');
  }
}
}
