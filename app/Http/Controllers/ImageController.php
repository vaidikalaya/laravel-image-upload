<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request){
        
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        try{
            $image=$request->image; //OR $request->file('image');
            $image_name=time().'-'.$image->getClientOriginalName();
            $uploaded_path=public_path('uploads/images/');
            $image->move($uploaded_path,$image_name);
            $img_path=asset('uploads/images/'.$image_name);

            return back()->with('success_msg','image upload successfully')
                        ->with('uploaded_img',$img_path);
        }
        catch(Exception $e){
            return $e;
        }
    }
}
