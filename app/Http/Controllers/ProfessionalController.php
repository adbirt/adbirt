<?php

namespace app\Http\Controllers;

use App\Professional;
use App\ProfessionalPurchase;
use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\Pagination;

class ProfessionalController extends Controller
{
    public function view()
    {
        $professionals = Professional::where('active', 1)
                ->whereHas('profile', function ($query) {
                    $query->whereNotNull('propic');
                })
                ->orderBy('id', 'asc')
               ->paginate(6);
               
        return view('professional.view', compact('professionals'))
            ->with('title', 'All Professionals List');
    }
    
    
    public function index()
    {
        // Build array
        $array = [];
        return new Paginator($array, $perPage);
        ;
    }




    public function buy($id)
    {
        $pro = Professional::where('id', $id)->first();
        $balance = Transaction::where('user_id', \Auth::user()->id)->sum('amount');
        $productAmount = ProfessionalPurchase::where('user_id', \Auth::user()->id)->sum('amount');
        $sum = $balance - $professionalAmount;


        if ($sum >= $pro->pro_price) {
            $professional = new ProfessionalPurchase();

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
            return redirect()->route('product.view')->with('error', 'Sorry, You have not enough balance to buy this product.');
        }
    }
}
