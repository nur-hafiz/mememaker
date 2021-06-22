<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public static function build ($source)
    {
        $imageName = 'mememaker-' . time() . '.png';
        $path = public_path('submissions'). '/' . $imageName;
        $image = str_replace('data:image/png;base64,', '', $source);
        $image = str_replace(' ', '+', $image);
        $image = base64_decode($image);

        File::put($path, $image);

        return 'submissions/' . $imageName;
    }
}
