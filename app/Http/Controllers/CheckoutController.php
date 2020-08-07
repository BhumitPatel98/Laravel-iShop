<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if( Cart::getContent()->count() == 0)
        {
            Session()->flash('info','Your cart is still empty. do some shopping');

            return redirect()->back();
        }

        return view('checkout');
    }
}
