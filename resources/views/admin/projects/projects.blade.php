@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Projects</h3>
                        <div class="card-tools">
                            <a href="{{ route('create_project') }}" class="btn btn-primary">Add Project</a>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if(count($projects) > 0)
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>SHOW</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp

                                    @foreach($projects as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->link }}</td>

                                            @if($item->status)
                                                <td>Active</td>
                                            @else
                                                <td>Non active</td>
                                            @endif
                                            <td>
                                                <form action="{{ route('show_project', $item->id) }}" method="GET">
                                                    @csrf
                                                    <button class="btn btn-outline-success" title="Show">Show</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('edit_project', $item->id) }}" method="GET">
                                                    @csrf
                                                    <button class="btn btn-outline-warning" title="Edit">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('destroy_project', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
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
