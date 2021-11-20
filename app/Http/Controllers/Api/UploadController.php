<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $fileExc  = $request->file('file')->getClientOriginalExtension();
        $fileName = md5($request->file('file')->getClientOriginalName().time()).'.'.$fileExc;
        $destinationPath = public_path().'/uploads/posts/';
        $request->file('file')->move($destinationPath, $fileName);
        return json_encode([
            'location'=>'/uploads/posts/'.$fileName,
        ], true);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json_encode(['location' => '/storage/'.$imgpath]);

        return json_encode([
            'location' => '/uploads/posts/6b33010884cf2b14e191eeaef3d055d3.jpg'
        ], true);*/
    }
}
