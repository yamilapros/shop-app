<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->save();

        $status = 'Tu pedido se ha registrado correctamente, te contactaremos por vía email';
        return back()->with(compact('status'));
    }
}
