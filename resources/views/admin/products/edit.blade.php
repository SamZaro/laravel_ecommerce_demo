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
                                <h4 style="color: white">Edit Product</h4>
                            </div>
                                <div class="card-body">
                                    <form action="{{ url('products/update/'.$product->id) }}" method="POST" class="pb-5" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 mb-3">

                                                <div class="input-group input-group-outline my-3">
                                                    <label for="cate_id" class="col-md-8 control-label">Select a Category</label>
                                                    <div class="col-md-8">
                                                        <select name="cate_id" id="cate_id" class="form-control">
                                                            @foreach ($category as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $product->cate_id ? 'selected': '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Product Name:</label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $product->name }}" >
                                                    <div style="color:red;">{{ $errors->first('name') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Slug</label>
                                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $product->slug }}" >
                                                    <div style="color:red;">{{ $errors->first('slug') }}</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Small Description:</label>
                                                        <input type="text" class="form-control" name="small_description" value="{{ old('small_description') ?? $product->small_description}}">
                                                        <div style="color:red;">{{ $errors->first('small_description') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Full Description:</label>
                                                        <textarea type="text" class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                                                        <div style="color:red;">{{ $errors->first('description') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Selling Price:</label>
                                                    <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price') ?? $product->selling_price }}" >
                                                    <div style="color:red;">{{ $errors->first('selling_price') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Original Price:</label>
                                                    <input type="number" class="form-control" name="original_price" value="{{ old('original_price') ?? $product->original_price}}">
                                                    <div style="color:red;">{{ $errors->first('original_price') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Quantity:</label>
                                                    <input type="number" class="form-control" name="qty" value="{{ old('qty') ?? $product->qty }}">
                                                    <div style="color:red;">{{ $errors->first('qty') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div class="form-check">
                                                    <label class="custom-control-label" for="">Trending </label>
                                                    <input type="checkbox" {{ $product->trending == "1" ? 'checked' : ''  }} class="form-check-input" name="trending">
                                                    <div style="color:red;">{{ $errors->first('trending') }}</div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div class="form-check">
                                                    <label class="form-label" for="">Status</label>
                                                    <input type="checkbox" {{ $product->status == "1" ? 'checked' : ''  }} class="form-check-input" name="status">
                                                    <div style="color:red;">{{ $errors->first('status') }}</div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group d-flex flex-column">
                                                    <label for="image">Edit Images</label>
                                                    <input type="file" name="images[]" multiple>
                                                    <div style="color:red;">{{ $errors->first('images') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="carousel-item active" style="background-color: #fff; padding: 10px;">
                                                    @if (count($product->images)>0)
                                                    <hr>
                                                    @foreach ($product->images as $img)
                                                    <img src="/assets/uploads/products/carousel/{{ $img->image }}" class="img-thumbnail img-responsive" height="150" width="150" style="margin-right: 20px;">
                                                    @endforeach
                                                    @endif
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="col-md-5 mb-3">
                                            <button type="submit" class="btn btn-success">Update Product</button>
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
