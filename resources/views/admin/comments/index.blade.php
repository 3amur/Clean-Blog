@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">View All Comments</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('admin.layouts.message')
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Comment</th>
                                            <th>Post Title</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->content }}</td>
                                            <td>{{ $comment->post->title }}</td>
                                            <td>
                                                <form action="{{ route('admin.comments.delete',$comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="text" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="p-3">
                                    {{ $comments->links() }}
                                </div>
                            </div>
                          </div>
                <!-- /.card -->
        </div>
    </div>

@endsection