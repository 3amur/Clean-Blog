@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">View All Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('admin.layouts.message')
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit',$cat->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.categories.destroy',$cat->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="text" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                          </div>
                          <!-- /.card -->
        </div>
    </div>

@endsection