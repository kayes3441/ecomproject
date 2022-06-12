<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;

class CheckOutController extends Controller
{

    private $cartProducts;
    private $customer;
    private $order;
    private $orderDetail;

    public function checkoutProduct()
    {
        return view('front.checkout.checkout');
    }

    public function newOrder(Request $request)
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = new Customer();
            $this->customer->name       = $request->name;
            $this->customer->email      = $request->email;
            $this->customer->password   = bcrypt($request->mobile);
            $this->customer->mobile     = $request->mobile;
            $this->customer->address    = $request->delivery_address;
            $this->customer->save();

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }

        if ($request->payment_method == 1)
        {
            $this->order = new Order();
            $this->order->customer_id       = $this->customer->id;
            $this->order->order_total       = Session::get('total');
            $this->order->tax_amount        = Session::get('tax');
            $this->order->shipping_cost     = Session::get('shipping');
            $this->order->order_date        = date('Y-m-d');
            $this->order->order_timestamp   = strtotime(date('Y-m-d'));
            $this->order->payment_type      = $request->payment_method;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->save();

            $this->cartProducts = Cart::getContent();
            foreach ($this->cartProducts as $cartProduct)
            {
                $this->orderDetail = new OrderDetail();
                $this->orderDetail->order_id = $this->order->id;
                $this->orderDetail->product_id = $cartProduct->id;
                $this->orderDetail->product_name = $cartProduct->name;
                $this->orderDetail->product_price = $cartProduct->price;
                $this->orderDetail->product_quantity = $cartProduct->quantity;
                $this->orderDetail->save();
            }

            foreach ($this->cartProducts as $cartProduct)
            {
                Cart::remove($cartProduct->id);
            }
            return redirect('/customer-order-complete')->with('message', "Congratulation ". $this->customer->name ." . Your order post successfully. Please wait. we will contact with you soon.");
        }
        else
        {
            return view('api.online-payment');
        }
    }
}
