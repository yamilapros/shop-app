<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index($id){

        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id){

        
        //Validar
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);
        
        //Poner nombre único
        $filename = time() . "." . $request->image->extension();
        //Almacenar imagen
        $request->image->move(public_path('images/products'), $filename);

        //Guardar en tabla de product_image la imagen
        $productImage = new ProductImage();
        $productImage->image = $filename;
        //$productImage->featured = false;
        $productImage->product_id = $id;
        $productImage->save();

        return back();
    }

    public function destroy(Request $request, $id){
        //Eliminar de public
        $productImage = ProductImage::find($request->image_id);
        if(substr($productImage->image, 0, 4) === 'http'){
            $deleted = true;
        }else{
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $deleted = unlink($fullPath);
        }
        //Eliminar de bd
        if($deleted){
            $productImage->delete();
        }
        return back();
    }

    public function featured($id, $image){

        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $featuredImage = ProductImage::find($image);
        $featuredImage->featured = true;
        $featuredImage->save();

        return back();
    }
}
