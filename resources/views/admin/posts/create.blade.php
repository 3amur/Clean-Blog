@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Add New Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="card-body">
                                @include('admin.layouts.message')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Title</label>
                                  <input type="text" name="title" class="form-control" id="" placeholder="Enter Post title">
                                </div>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Body</label>
                                  <textarea name="body" class="form-control" id="" cols="5" rows="5"></textarea>
                                </div>
                                @error('body')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Category</label>
                                  <select class="form-control" name="category_id">
                                    @foreach ($categories as $cat)
                                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                  <label for="">Image</label>
                                  <input type="file" name="image" class="form-control">
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.card -->
        </div>
    </div>

@endsection