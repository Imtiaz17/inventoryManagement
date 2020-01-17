<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Product $product)
    {
        return view('company.orderproduct');
    }

    public function store(Request $request)
    {  $product= new Product();
        $product->order_date= Carbon::now();
        $product->name=$request->name;
        $product->save();
        return back();
    }
}
