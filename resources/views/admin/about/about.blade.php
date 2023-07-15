@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if($about)
                            <table id="about" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Block name</th>
                                        <th scope="col">Info</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($about as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="td-info">{{ $item->info }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td><a class="btn btn-outline-warning" href="{{ route('edit_about', $item->id) }}">Edit</a></td>
                                    </tr>
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

        <div class="row">
            <div class="col-6">
                <form action="{{route('update_about_status')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Choose Active About Block</label>
                        <select name="status" class="form-control" id="status">
                            @foreach($about as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
