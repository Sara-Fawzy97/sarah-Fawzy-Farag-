<?php

namespace App\Http\Service;

class Media
{

    public static function upload($img, $dir)
    {
        $fileName=$img->hashName();
        $img->move(public_path("dist\img\\{{$dir}}"));
        return $fileName;
    }

    public static function destroyPhoto(string $path){
       
        if(file_exists(public_path($path))){
            unlink(public_path($path));
            return true;
        }
        return false;
    }
}
