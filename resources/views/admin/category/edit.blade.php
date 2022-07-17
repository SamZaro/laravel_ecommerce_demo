@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary"><h4 style="color: white">Edit Category</h4></div>
                                <div class="card-body">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="pb-5" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p>Category Name:</p>
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="form-label" for="name"></label>
                                                    <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                                                    <div style="color:red;">{{ $errors->first('name') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p>Slug:</p>
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="form-label" for="slug"></label>
                                                    <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                                                    <div style="color:red;">{{ $errors->first('slug') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p>Description:</p>
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="form-label" for="description"></label>
                                                    <input type="text" value="{{ $category->description }}" class="form-control" name="description">
                                                    <div style="color:red;">{{ $errors->first('description') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-3">
                                                <div class="form-group d-flex flex-column">
                                                    <label class="m-2">Category Image</label>
                                                    <input type="file" id="input-file-now-custom-3" name="image">
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="col-md-8 mb-3">
                                                <img src="/assets/uploads/category/{{ $category->image }}" class="img-thumbnail img-responsive" height="150" width="150" style="margin-right: 20px;">
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="col-md-5 mb-3">
                                            <button type="submit" class="btn btn-success">Update Category</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
