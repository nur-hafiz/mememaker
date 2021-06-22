<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;

class MemeController extends Controller
{

    public function create (Request $request)
    {
        $image = ImageController::build($request->image);

        $meme = new Meme();
        $meme->title = $request->title;
        $meme->image = $image;
        $meme->save();

        return json_encode(['status' => 201, 'data' => [
            'title' => $meme->title,
            'image' => $meme->image
        ]]);
    }

    public function show (Request $request)
    {
        if($request->search ?? $request->meme) {
            $memes = Meme::filter($request->search ?? $request->meme);
        } else {
            $memes = Meme::all();
        }

        return view('memes', [
            'memes' => $memes
        ]);
    }
}
