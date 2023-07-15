@extends('admin.admin_basic')

@section('content')

    <!-- right column -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit About</h3>
            </div>

            <div class="card-body">

                @if(isset($about))

                    <form role="form" action="{{ route('update_about', $about->id) }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- ABOUT INFO  --}}
                            <div class="col-sm-12">
                                 <div class="form-group">
                                    <label>About INFO</label>
                                    <textarea name="info" class="form-control" >{{ $about->info }}</textarea>
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
