<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;
    private static $image;
    private static $imageName;
    private static$imageUrl;
    private static$directory;

    public static function getImageUrl($request)
    {
        self::$image        =$request->file('image');
        self::$imageName    =self::$image->getClientOriginalName();
        self::$directory    ='category-image/';
        self::$image        ->move(self::$directory,self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$category              =new Category();
        self::$category->name        = $request->name;
        self::$category->description = $request->description;
        self::$category->image=self::getImageUrl($request);
        self::$category->save();

    }

    public static function updateCategory($request,$id)
    {
        //find category by id
        self::$category =Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            //new image
            self::$imageUrl =self::getImageUrl($request);
        }
        else
        {
            //jeta image ache otay thkbe
            self::$imageUrl=self::$category->image;
        }
        self::$category->name        =$request->name;
        self::$category->description =$request->description;
        self::$category->image       =self::$imageUrl;
        self::$category->save();

    }

    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }


}
