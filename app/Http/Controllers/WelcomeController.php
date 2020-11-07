<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(){
        $products = Product::paginate(9);
        return view('welcome')->with(compact('products'));
    }
}
