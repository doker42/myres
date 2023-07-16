<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.projects', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $project = new Project();
            $project->fill($input);

            $project->img_name = $input['image']->getClientOriginalName();

            $path = $request->file('image')->store('uploads/images', 'public');

            $project->img_path = $path;

            if ($project->save()) {

                return redirect(env('ADMIN').'/projects')->with('status', 'Project was created');

            } else {

                unlink('public/storage/' . $path);

                return redirect(env('ADMIN').'/projects/create')->withErrors('Project wasn\'t created');
            }
        }

        return redirect()->route('create_project')->withErrors('Error STORE');
    }


    public function show($id)
    {
        $project = Project::find($id);

        return view('admin.projects.show', compact('project'));
    }


    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');
            $project = Project::find($id);

            if(isset($input['image'])){

                $project->img_name = $input['image']->getClientOriginalName();

                if (file_exists($project->img_path)){
                    unlink('public/storage/'.$project->img_path);
                }

                $path = $request->file('image')->store('uploads/images', 'public');
                $project->img_path = $path;
            }
            $project->fill($input);
            $project->status = isset($input['status']) ? true : false ;

            if ($project->update()) {

                return redirect(env('ADMIN').'/projects')->with('status', 'Project was updated');

            } else {

                return redirect(env('ADMIN').'/projects/'.$id)->withErrors('Project wasn\'t updated');
            }
        }

        return redirect()->route('projects')->withErrors('Error UPDATE');
    }


    public function destroy(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $project = Project::find($id);

            if ($project->delete()) {

                return redirect(env('ADMIN').'/projects')->with('status', 'Project was deleted');

            } else {

                return redirect(env('ADMIN').'/projects')->withErrors('Project wasn\'t deleted');
            }
        }

        return redirect()->route('projects')->withErrors('Error Deleting');
    }
}
