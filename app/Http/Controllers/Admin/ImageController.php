<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin.images.images', ['images' => $images ]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $input = $request->except('_token');
            $image = new Image();
            $filename = $input['image']->getClientOriginalName();
            $image->filename = $filename;
//            asset('storage/app/public/avatars/'.$filename);
            $path = $request->file('image')->store('uploads/images', 'public');
            $image->path = $path;

            if(!$image->save()){
                unlink('public/storage/'.$path);

                return redirect(env('ADMIN').'/images')->withErrors('Image wasn\'t uploaded');
            }

            return redirect(env('ADMIN').'/images')->with('status', 'Image was uploaded');
        }
    }


    public function update(Request $request, Image $image)
    {
        Image::where('status', 1)->update(['status' => 0]);
        $image = Image::find($image->id);
        $image->status = 1;
        if($image->update()){

            return redirect(env('ADMIN').'/images')->with('status', 'The Image was update');
        }

        return redirect(env('ADMIN').'/imagess')->withErrors('The Image wasn\'t updated');
    }
}
