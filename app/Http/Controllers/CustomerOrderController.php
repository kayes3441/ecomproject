<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function customerOrder()
    {
        return view('front.customer.order-complete');
    }
}
