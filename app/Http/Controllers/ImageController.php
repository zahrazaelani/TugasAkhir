<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function phone(User $user)
    {
        
        $img = Image::make(file_get_contents('images/phone_template.png'));
        $img->text($user->phone_number ?? '', 5, 25, function ($font) {
            $font->file(public_path('fonts/SegoeUI.ttf'));
            $font->size(28);
            $font->color('#FFFFFF');
            $font->align('left');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->save(public_path('images/phone/'. $user->phone_number .'.png'));

        return Image::make(public_path('images/phone/'. $user->phone_number .'.png'))->response('png');
    }
}
