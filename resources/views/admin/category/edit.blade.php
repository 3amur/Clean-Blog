@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Edit Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                              <div class="card-body">
                                @include('admin.layouts.message')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="" placeholder="Enter Category Name">
                                </div>
                                @error('name')
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