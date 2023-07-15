@extends('admin.admin_basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Project</h3>
            </div>

            <div class="card-body table-responsive p-0">

                @if(isset($project))

                <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <td>NAME</td><td>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <td>Link</td><td>{{ $project->link }}</td>
                        </tr>
                        <tr>
                            <td>Git Link</td><td>{{ $project->git_link }}</td>
                        </tr>
                        <tr>
                            <td>Skills</td><td>{{ $project->skills }}</td>
                        </tr>
                        <tr>
                            <td>Description</td><td>{{ $project->description }}</td>
                        </tr>
                        <tr>
                            <td>Status</td><td>{{ $project->status }}</td>
                        </tr>
                        <tr>
                            <td>Image name</td><td>{{ $project->img_name }}</td>
                        </tr>
                        <tr>
                            <td>Image path</td><td>{{ $project->img_path }}</td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>

        </div>

        <a class="btn btn-warning" href="{{ route('edit_project', $project->id) }}">Edit</a>

    </div>

@endsection


