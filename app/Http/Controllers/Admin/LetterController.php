<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Letter;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();

        return view('admin.letters.letters', compact('letters'));
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $letter = new Letter();
            $filename = $input['letter']->getClientOriginalName();
            $letter->filename = $filename;
            $path = $request->file('letter')->storeAs('uploads/letters', $filename, 'public');


            $letter->path = $path;

            if (!$letter->save()) {

                unlink('public/storage/' . $path);

                return redirect(env('ADMIN').'/letters')->withErrors('Letter wasn\'t uploaded');
            }

            return redirect(env('ADMIN').'/letters')->with('status', 'Letter was uploaded');
        }
    }


    public function update(Request $request, $id)
    {
        Letter::where('status', 1)->update(['status' => 0]);
        $letter = Letter::find($id);
        $letter->status = 1;
        if($letter->update()){

            return redirect(env('ADMIN').'/letters')->with('status', 'The Letter was update');
        }

        return redirect(env('ADMIN').'/letters')->withErrors('The Letter wasn\'t updated');
    }


    public function destroy(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $letter = Letter::find($id);

            if($letter){

                if($letter->delete()){

                    unlink('public/storage/' . $letter->path);

                    return redirect(env('ADMIN').'/letters')->with('status', 'Letter was deleted');
                }

                return redirect(env('ADMIN').'/letters')->withErrors('The Letter wasn\'t found');
            }
        }

        return redirect(env('ADMIN').'/letters')->withErrors('The METHOD ERROR');
    }
}
