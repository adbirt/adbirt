<?php

namespace app\Http\Controllers;

use App\Explorer;
use App\ProductPurchase;
use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;

class ExplorerController extends Controller
{
    public function view()
    {
        $explorers = Explorer::paginate(4);
        return view('explorer.view', compact('explorers'))
            ->with('title', 'All Explorers List');
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
                return redirect()->route('product.view')->with('success', 'Thank you for Purchasing Our Product');
            } else {
                return redirect()->route('product.view')->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->route('product.view')->with('error', 'Sorry, You don\'t have sufficient Credit to buy this product.');
        }
    }
}
