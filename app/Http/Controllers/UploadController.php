<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller{

    public function upload(Request $request){
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->images->getClientOriginalExtension();

        $request->images->move(public_path('images'), $imageName);

        return back();
    }
}
