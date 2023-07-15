@extends('admin.admin_basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Project</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('store_project') }}" enctype="multipart/form-data" method="post">
                    @csrf
{{--  NAME --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
{{--  link  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Link</label>
                                <input name="link" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- skills --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Skills</label>
                                <textarea name="skills" class="form-control"></textarea>
                            </div>
                        </div>
{{-- description --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
{{-- image --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
{{--  git_link  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Git Link</label>
                                <input name="git_link" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>

@endsection
