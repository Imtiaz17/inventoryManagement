<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  

    public function index()
    {
        $products=Product::where('status',1)->get();
        return view('supplier.index',compact('products'));
    }
    public function supplyProduct(Request $request,Product $product)
    {
      $product->update([
        'status'=>0,
        'supply_date'=>Carbon::now()
      ]);
      return back();

    }

}
