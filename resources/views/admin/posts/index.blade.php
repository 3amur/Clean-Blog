@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">View All Posts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('admin.layouts.message')
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ \Str::limit($post->body, 100) }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                <img src="{{ $post->image() }}" width="100" height="100">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="text" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="p-1">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                          </div>
                <!-- /.card -->
        </div>
    </div>

@endsection