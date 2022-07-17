@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 style="color: white">Create New Category</h4>
                            </div>
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="POST" class="pb-5" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Name </label>
                                                    <input type="text" class="form-control" name="name">
                                                    <div style="color:red;">{{ $errors->first('name') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Slug </label>
                                                    <input type="text" class="form-control" name="slug">
                                                    <div style="color:red;">{{ $errors->first('slug') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Description </label>
                                                    <input type="text" class="form-control" name="description">
                                                    <div style="color:red;">{{ $errors->first('description') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group d-flex flex-column">
                                                    <label class="m-2">Category Image</label>
                                                    <input type="file" id="input-file-now-custom-3" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="col-md-5 mb-3">
                                            <button type="submit" class="btn btn-success">Add Category</button>
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
