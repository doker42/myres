<?php

namespace App\Http\Controllers\Admin;

use App\CommonClasses\FileUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AvatarDeleteRequest;
use App\Http\Requests\Admin\AvatarStoreRequest;
use App\Http\Requests\Admin\AvatarUpdateRequest;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function index()
    {
        $avatars = Avatar::all();

        return view('admin.avatars.avatars', ['avatars' => $avatars ]);
    }


    public function store(AvatarStoreRequest $request)
    {
        $validated = $request->validated();
        $file = $validated['avatar'];
        $filename = FileUploader::createFileName($file);

        $file->storeAs(
            'uploads/avatars/' . $filename,
            '',
            'public'
        );

        $avatar = Avatar::create([
            'original_filename' => $file->getClientOriginalName(),
            'filename' => $filename,
            'status'   => false
        ]);

        if (!$avatar) {
            return redirect(route('avatars'))->withErrors('Avatar wasn\'t uploaded');
        }

        return redirect(route('avatars'))->with('status', 'Avatar was uploaded');
    }


    public function update(AvatarUpdateRequest $request, $id)
    {
        Avatar::where('status', 1)->update(['status' => 0]);
        $avatar = Avatar::find($id);
        $avatar->status = 1;

        if ($avatar->update()){
            return redirect(route('avatars'))->with('status', 'The Avatar was update');
        }

        return redirect(route('avatars'))->withErrors('The Avatar wasn\'t updated');
    }


    public function destroy(AvatarDeleteRequest $request, $id)
    {
        $avatar = Avatar::find($id);

        if ($avatar->delete()) {

            Storage::disk('public')->delete('uploads/avatars/' . $avatar->filename);

            return redirect(route('avatars'))->with('status', 'Avatar was deleted');

        } else {

            return redirect(route('avatars'))->withErrors('Avatar wasn\'t deleted');
        }
    }

}
