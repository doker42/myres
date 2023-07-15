@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visitors</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if(count($visitors) > 0)
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ip</th>
                                        <th>Hits</th>
                                        <th>Visited Date</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @php $i = 1; @endphp

                                @foreach($visitors as $item)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->ip }}</td>
                                        <td>{{ $item->hits}}</td>
                                        <td>{{ $item->visited_date }}</td>
                                        <td>{{ $item->location }}</td>
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
