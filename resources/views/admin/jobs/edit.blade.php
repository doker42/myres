@extends('admin.admin_basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Job</h3>
            </div>

            <div class="card-body">

                @if(isset($job))

                <form role="form" action="{{ route('update_job', $job->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Date range -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                    <input name="dateRange" type="text" class="form-control float-right" value="{{ $job->dateRange }}" >
                                </div>
                            </div>
                        </div>
                        {{-- COMPANY LINK --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company link</label>
                                <input name="companyLink" type="text" class="form-control" value="{{ $job->companyLink }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- COMPANY NAME --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company name</label>
                                <input name="companyName" type="text" class="form-control" value="{{ $job->companyName }}">
                            </div>
                        </div>
                        {{--  POSITION  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input name="position" type="text" class="form-control" value="{{ $job->position }}">
                            </div>
                        </div>
                    </div>
                    {{-- TYPE JOB, LANGS --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type Job</label>
                                <input name="typeJob" type="text" class="form-control" value="{{ $job->typeJob }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Langs</label>
                                <input name="langs" type="text" class="form-control" value="{{ $job->langs }}">
                            </div>
                        </div>
                    </div>
                    {{-- LIBRARIES--}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Libraries</label>
                                <input name="library" type="text" class="form-control" value="{{ $job->library }}">
                            </div>
                        </div>
                    </div>
                    {{-- STACK --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Stack</label>
                                <input name="stack" type="text" class="form-control" value="{{ $job->stack }}">
                            </div>
                        </div>
                    </div>
                    {{-- ADDITIONS --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Additions</label>
                                <input name="additions" type="text" class="form-control"  value="{{ $job->additions }}">
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
