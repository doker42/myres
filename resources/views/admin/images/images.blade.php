@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Images</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if(count($images) > 0)
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name</th>
                                    <th>Mini</th>
                                    <th>ON/OFF</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form action="" method="GET">
                                    @csrf
                                    @php $i = 1; @endphp
                                    @foreach($images as $item)
                                        @if($item->status)
                                            @php $chosen = 'chosen'; @endphp
                                        @else
                                            @php $chosen = ''; @endphp
                                        @endif
                                        <tr  class="{{ $chosen }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->filename }}</td>
                                            <td>
                                                <div class="container">
                                                    <img src="{{ asset('storage/app/public/'.$item->path) }}" class="img-thumbnail" width="50" height="40">
                                                </div>
                                            </td>
                                            @if($item->status)
                                                <td>
                                                    <a href="" class="btn btn-success disabled">Active image</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('update_image', $item ) }}" class="btn btn-success">On</a>
                                                </td>
                                            @endif
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </form>
                                </tbody>
                            </table>
                        @else
                            <div class="text-center"><h5> no data </h5></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-6">
                <div class="container text-center"><h3>ADD IMAGE</h3></div>
                <form action="{{ route('store_image') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="input-group is-invalid">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image" required>
                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose image file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Upload</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").html(fileName);
            // $(this).siblings(".custom-file-label").append(fileName);
        });
    </script>

@endsection
