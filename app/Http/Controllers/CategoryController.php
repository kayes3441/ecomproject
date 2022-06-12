<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    private $categories;

    public function add()
    {
        return view('admin.category.add');
    }
    public function create(Request $request)
    {
//        return $request->all();
        Category::newCategory($request);
        return redirect()->back()->with('message','Category Info Create Successfully');
    }
    public  function manage()
    {
        $this->categories =Category::orderBy('id','desc')->get();
        return view('admin.category.manage',
        [
            'categories'=>$this->categories
        ]);
    }
    public function edit(Request $request,$id)
    {
        $this->category=Category::find($id);
        return view('admin.category.edit',
        [
            'category'=>$this->category
        ]);
    }
    public function update(Request $request ,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','Category Info Update Successfully');
    }

    public function delete($id)
    {
        $this->category =Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();

        return redirect('/manage-category')->with('message','Category Info Delete Successfully');
    }

}
