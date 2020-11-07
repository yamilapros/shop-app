<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::find($id);
        $images = $product->images;
        return view('products.show')->with(compact('product', 'images'));
    }
}
