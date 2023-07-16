<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employment;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();

        return view('admin.about.about', compact('about'));
    }

    public function edit($id)
    {
        $about = About::find($id);

        return view('admin.about.edit', compact('about'));
    }


    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $about = About::find($id);

            $about->fill($input);

            if ($about->update()) {

                return redirect(env('ADMIN').'/about')->with('status', 'About Info was updated');
            } else {

                return redirect(env('ADMIN').'/about/edit/'.$id)->withErrors('About info wasn\'t updated');
            }
        }

        return redirect()->route('about')->withErrors('Error UPDATE');
    }

    public function updatestatus(Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            About::where('status', 1)->update(['status' => 0]);

            $about = About::find($input['status']);

            $about->status = true;

            if ($about->update()) {

                return redirect(env('ADMIN').'/about')->with('status', 'About Info was updated');
            } else {

                return redirect(env('ADMIN').'/about')->withErrors('About info wasn\'t updated');
            }
        }

        return redirect(env('ADMIN').'/about/')->withErrors('About info wasn\'t updated. Wrong method');
    }


    public function destroy($id)
    {
        //
    }
}
