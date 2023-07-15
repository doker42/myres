@extends('admin.admin_basic')

@section('content')

    <!-- right column -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Job</h3>
            </div>

            <div class="card-body">

                <form role="form" action="{{ route('store_job') }}" method="post">
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
                                    <input name="dateRange" type="text" class="form-control float-right" id="reservation">
                                </div>
                            </div>
                        </div>
                    </div>
{{-- COMPANY NAME --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company name</label>
                                <input name="companyName" type="text" class="form-control">
                            </div>
                        </div>
{{--  POSITION  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input name="position" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- TYPE JOB, LANGS --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type Job</label>
                                <input name="typeJob" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Langs</label>
                                <input name="langs" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- LIBRARIES--}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Libraries</label>
                                <input name="library" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- STACK --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Stack</label>
                                <input name="stack" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- ADDITIONS --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Additions</label>
                                <input name="additions" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>

@endsection
