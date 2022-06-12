<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class OtherImage extends Model
{
    use HasFactory;
    public static $otherImages;
    public static $otherImage;
    public static $image;
    public static $imageName;
    public static $imageUrl;
    public static $directory;

    public static function getOtherImageUrl($otherImage)
    {
        self::$imageName =$otherImage->getClientOriginalName();
        self::$directory ='Other Images/';
        $otherImage   ->move(self::$directory,self::$imageName);
        self::$imageUrl  =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newOtherImage($request,$id)
    {
        self::$otherImages= $request->file('other_image');
        foreach (self::$otherImages as $otherImage)
        {
            self::$otherImage =new OtherImage();
            self::$otherImage->product_id =$id;
            self::$otherImage->image=self::getOtherImageUrl($otherImage);
            self::$otherImage->save();

        }
    }
    public static function updateOtherImage($request,$id)
    {
        self::$otherImages =OtherImage::where('product_id',$id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
        self::newOtherImage($request,$id);
    }
}
