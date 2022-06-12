<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;


    public function login(Request $request)
    {
        $this->customer =Customer::where('email',$request->email)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/');
            }
            else
            {
                return redirect()->back()->with('message', ' Password is invalid.');
            }
        }
        else
        {
            return redirect()->back()->with('message','Invalid Email Or Password');
        }

    }

    public function register()
    {
        return view('front.customer-auth.register');
    }

    public function newCustomer(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name       = $request->name;
        $this->customer->email      = $request->email;
        $this->customer->password   = bcrypt($request->password);
        $this->customer->mobile     = $request->mobile;
        $this->customer->save();

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/');
    }
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }


}
