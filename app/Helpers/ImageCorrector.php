<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;

class ImageCorrector
{
    public static function getAvatar($img, $w=500, $h=300)
    {
        $image = Image::make($img);
        $height = $image->height();
        $width = $image->width();

        if($height>=$width) {
            $image->resize($w, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        if($width>=$height) {
            $image->resize(null, $h, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $image->resizeCanvas($w, $h, 'center', false, '3c3f41');
        //$image->colorize(-100, -100, -100);

        $image->save();
    }
}
