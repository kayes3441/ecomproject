<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreOrderProductController extends Controller
{
    public function add()
    {
        return view('admin.pre-order.add');
    }
    public function manage()
    {
        return view('admin.pre-order.manage');
    }
}
