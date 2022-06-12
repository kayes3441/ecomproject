<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;
    private $product;
    private $otherImages;

    public function add()
    {

        return view('admin.product.add',
            [
                //no need to property declaration
                'categories'     =>Category::all(),
                'sub_categories' =>SubCategory::all(),
                'brands'         =>Brand::all(),
                'units'          =>Unit::all(),
            ]);
    }
    public function create(Request $request )
    {
       $this->product=Product::newProduct($request,);
       OtherImage::newOtherImage($request,$this->product->id);
       return redirect()->back()->with('message','Product Info Create Successfully');
    }

    public function getSubCategory()
    {
        $this->categoryId =$_GET['id'];
        $this->subCategories =SubCategory::where('category_id',$this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    public function manage()
    {

        return view('admin.product.manage',
        [
            'products'=>Product::orderBy('id','desc')->get()
        ]);
    }
    public function detail($id)
    {
        $this->product =Product::find($id);
        return view('admin.product.detail',
            [
                'product'=>$this->product
            ]);
    }
    public function edit($id)
    {

        $this->product =Product::find($id);
        $this->otherImages=OtherImage::where('product_id',$id)->get();
        return view('admin.product.edit',
            [
                'product'=>$this->product,
                'categories'     =>Category::all(),
                'sub_categories' =>SubCategory::all(),
                'brands'         =>Brand::all(),
                'units'          =>Unit::all(),
                'otherImages'    =>$this->otherImages
            ]);
    }

    public function update(Request $request,$id)
    {
        Product::updateProduct($request,$id);
        if($request->file('other_image'))
        {
            if($request->file('other_image'))
            {
                OtherImage::updateOtherImage($request,$id);
            }
        }
        return redirect('/manage-product')->with('message','Product Info Create Successfully');
    }


    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message','Product Info Delete Successfully');
    }

}
