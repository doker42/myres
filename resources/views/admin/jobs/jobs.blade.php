@extends('admin.admin_basic')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jobs</h3>
                        <div class="card-tools">
                            <a href="{{ route('create_job') }}" class="btn btn-primary">Add Job</a>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if(count($jobs) > 0)
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Range</th>
                                    <th>Company</th>
                                    <th>Position</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr onclick="showForm({{ $job->id }})" data-toggle="modal" data-target="#modalLoginForm">
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->dateRange }}</td>
                                    <td>{{ $job->companyName }}</td>
                                    <td>{{ $job->position }}</td>
                                    <td><a class="btn btn-outline-warning" href="{{ route('edit_job', $job->id) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ route('destroy_job', $job->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                                        </form>
                                    </td>
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
    </div>
@endsection
