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
                                <h4 style="color: white">Create New Product</h4>
                            </div>
                                <div class="card-body">
                                    <form action="{{ url('products/store') }}" method="POST" class="pb-5" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label for="cate_id" class="col-md-8 control-label">Select a Category</label>
                                                    <div class="col-md-8">
                                                        <select name="cate_id" id="cate_id" class="form-control">
                                                            @foreach ($category as $item)
                                                                <option value="{{ $item->id }}" >{{ $item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Product Name </label>
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
                                                    <label class="form-label" for="">Small Description </label>
                                                    <input type="text" class="form-control" name="small_description">
                                                    <div style="color:red;">{{ $errors->first('small_description') }}</div>
                                                </div>
                                            </div>
                                            <div class="row ms-1">
                                                <div class="col-md-8 mb-3">
                                                    <div class="input-group input-group-static my-3">
                                                        <label>Full Description</label>
                                                        <textarea type="text" class="form-control" name="description" rows="5"></textarea>
                                                        <div style="color:red;">{{ $errors->first('description') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Selling Price </label>
                                                    <input type="number" class="form-control" name="selling_price">
                                                    <div style="color:red;">{{ $errors->first('selling_price') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Original Price </label>
                                                    <input type="number" class="form-control" name="original_price">
                                                    <div style="color:red;">{{ $errors->first('original_price') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label" for="">Quantity </label>
                                                    <input type="number" class="form-control" name="qty">
                                                    <div style="color:red;">{{ $errors->first('qty') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <hr>
                                                <div class="form-check">
                                                    <label class="custom-control-label" for="">Trending </label>
                                                    <input type="checkbox" class="form-check-input" name="trending">
                                                    <div style="color:red;">{{ $errors->first('trending') }}</div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <hr>
                                                <div class="form-check">
                                                    <label class="form-label" for="">Status</label>
                                                    <input type="checkbox" class="form-check-input" name="status">
                                                    <div style="color:red;">{{ $errors->first('status') }}</div>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-group d-flex flex-column">
                                                    <label for="image">Images</label>
                                                    <input type="file" name="images[]" multiple>
                                                    <div style="color:red;">{{ $errors->first('images') }}</div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="col-md-5 mb-3">
                                            <button type="submit" class="btn btn-success">Add Product</button>
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
