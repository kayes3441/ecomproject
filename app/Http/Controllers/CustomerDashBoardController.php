<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashBoardController extends Controller
{

    private $orders;
    public function customerDashBoard()
    {
        $this->orders =Order::where('customer_id',Session::get('customer_id'))->orderBy('id','desc')->simplePaginate(3);
        return view('front.customer-dashboard.customer-dashboard',
        [
            'orders'=>$this->orders
        ]);
    }
}
