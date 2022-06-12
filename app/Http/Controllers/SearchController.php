<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    private $search;
//    private $products;
//    private $output;
//    public function searchProductPage()
//    {
//        return view('front.search.search-page');
//    }
//    public function searchProduct(Request $request)
//    {
//        if ($request->ajax())
//        {
//            $this->products= Product::where('name','Like','%'.$request->value.'%')->orderBy('id','desc')->get();
//            if ($this->products)
//            {
//                $this->search = $this->products->name;
//            }
//
//        }
//        return redirect('/product-category/{id}');
//        return $request->all();
//    }

        private $products;
        public function searchProductPage(Request $request)
        {
            $request->validate(
                [
                    'search'=>'required'
                ]
            );
            $this->products =Product::where('name','Like',$request->search)
                            ->orwhere('selling_price','Like','%'.$request->search.'%')->get('name');
            return view('front.search.search-page',
            [
                'products'=>$this->products
            ]);
//            if ($request->ajax())
//            {
//                $this->products= Product::where('name','Like','%'.$request->search.'%')->get();
//                if ($this->products)
//                {
//
//                }
//
//            }
//            return view('front.search.search-page',
//            [
//                'products'=>$this->products
//            ]);
//            return $request->all();
        }

        public function searchProduct(Request $request)
        {
            return $request->all();
        }
}
