<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories;
    private $sub_categories;
    private $sub_category;

    public function add()
    {
        $this->categories= Category::all();
        return view('admin.sub-category.add',
            [
                'categories'=>$this->categories
            ]);
    }
    public function create(Request $request)
    {
//        return $request->all();
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message','Sub-Category Info Create Successfully');
    }

    public function manage()
    {
        $this->sub_categories =SubCategory::orderBy('id','desc')->get();
        return view('admin.sub-category.manage',
            [
                'sub_categories'=>$this->sub_categories
            ]);
    }
    public function edit($id)
    {

        $this->sub_category =SubCategory::find($id);
        $this->categories   =Category::all();
        return view('admin.sub-category.edit',
        [
            'sub_category'=>$this->sub_category,
            'categories'  =>$this->categories

        ]);
    }

    public function update(Request $request ,$id)
    {
//        return $request->all();
        SubCategory::updateSubCategory($request,$id);
        return redirect('/manage-sub-category')->with('message','Sub-Category Info Create Successfully');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategroy($id);
        return redirect('/manage-sub-category')->with('message','Sub-Category Info Delete Successfully');
    }
}
