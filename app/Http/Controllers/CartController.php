<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;
    public function cartProductAdd(Request $request,$id)
    {
        $this->product=Product::find($id);
        Cart::add(
        [
            'id'            => $this->product->id,
            'name'          => $this->product->name,
            'price'         =>$this->product->selling_price,
            'quantity'      => $request->qty,
            'attributes'    =>[
                'image'     =>$this->product->image
            ]
        ]
        );
        return redirect('/product-cart-show');
    }

    public function cartProductShow()
    {
        return view('front.cart.cart');
    }
    public function cartProductUpdate(Request $request,$id)
    {

        Cart::update($id, [
            'quantity'=> [
                'relative' => false,
                'value' => $request->qty
            ],
        ]);
        return redirect('/product-cart-show')->with('message','Quantity Update Successfully');
    }
    public function cartProductRemove($id)
    {

        Cart::remove($id);
        return redirect('/product-cart-show')->with('message','Cart Remove Successfully');
    }
    public function viewCartProductRemove($id)
    {
        Cart::remove($id);
        return redirect('/product-cart-show');
    }


}
