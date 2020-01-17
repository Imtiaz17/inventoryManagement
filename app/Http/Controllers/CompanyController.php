<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products=Product::where('status',0)->get();
        return view('company.index',compact('products'));
    }
    public function pendingProduct()
    {
        $products=Product::where('status',1)->get();
        return view('company.pendingproduct',compact('products'));
    }

}
