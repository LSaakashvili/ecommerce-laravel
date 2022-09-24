<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddImageController extends Controller
{
    function AddImage(Request $request) {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('img'), $imageName);

        return response()->send('success');
    }
}
