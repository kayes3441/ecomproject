<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products;

    public function index()
    {
        $this->products =Product::orderBy('id','desc')->take(10)->get();
        return view('front.home.home',
        [
            'products'=>$this->products
        ]);
    }
    public function allProduct()

    {
        $this->products =Product::orderBy('id','desc')->get();
        return view('front.product.product-all',
            [
                'products'=>$this->products
            ]);
    }

    public function categoryProduct($id)
    {
        $this->products =Product::where('category_id',$id)->orderBy('id','desc')->get();
        return view('front.product.product-category',
        [
            'products'=>$this->products
        ]);
    }
    public function subCategoryProduct($id)
    {
        $this->products =Product::where('sub_category_id',$id)->orderBy('id','desc')->get();
        return view('front.product.product-category',
            [
                'products'=>$this->products
            ]);
    }
    public function detailProduct($id)
    {
        $this->product=Product::find($id);
        return view('front.product-detail.product-detail',
            [
                'product'=>$this->product
            ]);
    }

}
