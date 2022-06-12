<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function manage()
    {
        return view('admin.order.manage');
    }
}
