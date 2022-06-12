<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function manage()
    {
        return view('admin.setting.manage');
    }
}
