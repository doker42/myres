<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobStoreRequest;
use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
    {
        $jobs = Employment::all();

        return view('admin.jobs.jobs', compact('jobs'));
    }


    public function create()
    {
        return view('admin.jobs.create');
    }


    public function store(JobStoreRequest $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $job = new Employment();
            $job->fill($input);

            if ($job->save()) {

                return redirect(env('ADMIN').'/jobs')->with('status', 'Job was created');
            } else {

                return redirect(env('ADMIN').'/create')->withErrors('Job wasn\'t created');
            }
        }

        return redirect()->route('create_job')->withErrors('Error STORE');
    }


    public function edit($id)
    {
        $job = Employment::find($id);

        return view('admin.jobs.edit', compact('job'));
    }


    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $job = Employment::find($id);

            $job->fill($input);

            if ($job->update()) {

                return redirect(env('ADMIN').'/jobs')->with('status', 'Job was updated');
            } else {

                return redirect(env('ADMIN').'/edit/'.$id)->withErrors('Job wasn\'t updated');
            }
        }

        return redirect()->route('jobs')->withErrors('Error UPDATE');
    }


    public function destroy(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $job = Employment::find($id);

            if ($job->delete()) {

                return redirect(env('ADMIN').'/jobs')->with('status', 'Job was deleted');
            } else {

                return redirect(env('ADMIN').'/jobs')->withErrors('Job wasn\'t deleted');
            }
        }

        return redirect()->route('jobs')->withErrors('Error Deleting');
    }
}
