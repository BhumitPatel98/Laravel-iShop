<?php

namespace App\Http\Controllers;


use App\Products;
use Session;
use Darryldecode\Cart\Facades\CartFacade as Cart ;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        // dd(request()->all());
        //  dd($pdt);
        $pdt= Products::find(request()->pdt_id);
        Cart::remove($pdt->id);
        $cartitem = Cart::add([

            'id' => $pdt->id,
            'name' => $pdt->name,
            'quantity' => request()->quantity,
            'price' => $pdt->price,
            'associatedModel' => 'App\Products'
        ]);

        Session()->flash('success','Product added to cart');
        
        return redirect()->route('cart');
      //dd($cartitem->getContent()->toArray());
      //dd(Cart::content());
    }

    public function cart()
    {
         //Cart::clear();
        return view('cart');
    }
    public function cart_delete($id)
    {
        Cart::remove($id);
        Session()->flash('error','Product remove from cart');
        return redirect()->back();
    }

    public function incr($id,$quantity)
    {

        Cart::update($id,array(
            'quantity'=>1
        ));
        Session()->flash('success','Product quantity updated');
        return redirect()->back();

    }

    public function decr($id,$quantity)
    {

        Cart::update($id,array(
            'quantity'=>-1
        ));
        Session()->flash('error','Product quantity updated');
        return redirect()->back();

    }

    public function rapid_add($id)
    {

        $pdt= Products::find($id);
        Cart::remove($pdt->id);
        $cartitem = Cart::add([

            'id' => $pdt->id,
            'name' => $pdt->name,
            'quantity' => 1,
            'price' => $pdt->price,
            'associatedModel' => 'App\Products'
        ]);

        Session()->flash('success','Product added to cart');
        
        return redirect()->route('cart');

    }
}
