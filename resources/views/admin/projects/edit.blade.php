@extends('admin.admin_basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Project</h3>
            </div>

            <div class="card-body">

                @if(isset($project))
                <form role="form" action="{{ route('update_project', $project->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        {{--  NAME --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project name</label>
                                <input name="name" type="text" class="form-control" value="{{ $project->name }}">
                            </div>
                        </div>
                        {{--  link  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Link</label>
                                <input name="link" type="text" class="form-control" value="{{ $project->link }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- skills --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Skills</label>
                                <textarea name="skills" class="form-control">{{ $project->skills }}</textarea>
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $project->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{--  git_link  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Git Link</label>
                                <input name="git_link" type="text" class="form-control" value="{{ $project->git_link }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{--       image             --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose new Image file</label>
                                <br>
                                <label for="">Old file: {{ $project->img_name }}</label>
                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        {{--       STATUS       --}}
                        <div class="col-sm-6">
                            <br>
                            <br>
                            <br>
                            @if($project->status == true)
                                @php $checked = "checked"; @endphp
                            @else
                                @php $checked = ""; @endphp
                            @endif
                            <div class="form-group form-check">
                                <input name="status" {{ $checked }} type="checkbox" class="form-check-input" value="1">
                                <label class="form-check-label" for="exampleCheck1">Status</label>
                            </div>
                        </div>
                    </div>

                   <button type="submit" class="btn btn-primary">UPDATE</button>

                </form>
                @endif
            </div>
        </div>
    </div>

@endsection
