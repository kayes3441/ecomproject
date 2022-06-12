<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $sub_category;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;


    public static function getImageUrl($request)
    {
        self::$image        =$request->file('image');
        self::$imageName    =self::$image->getClientOriginalName();
        self::$directory    ='Sub-Category Image/';
        self::$image        ->move(self::$directory,self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$sub_category                = new SubCategory();
        self::$sub_category->category_id   =$request->category_id;
        self::$sub_category->name          =$request->name;
        self::$sub_category->description   =$request->description;
        self::$sub_category->image         =self::getImageUrl($request);
        self::$sub_category->save();
    }

    public static function updateSubCategory( $request,$id)
    {
        self::$sub_category =SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$sub_category->image))
            {
                unlink(self::$sub_category->image);
            }
            self::$imageUrl =self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$sub_category->image;
        }

        self::$sub_category->category_id   =$request->category_id;
        self::$sub_category->name          =$request->name;
        self::$sub_category->description   =$request->description;
        self::$sub_category->image         =self::$imageUrl;
        self::$sub_category->save();

    }

    public static function deleteSubCategroy($id)
    {
        self::$sub_category =SubCategory::find($id);
        if(file_exists(self::$sub_category->image))
        {
            unlink(self::$sub_category->image);
        }
        self::$sub_category->delete();

    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


}
