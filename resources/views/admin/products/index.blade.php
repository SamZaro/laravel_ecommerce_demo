@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary mb-4">
                                <h4 style="color: white">All Products<a href="{{ url('products/create') }}" class="btn btn-success float-end">Create Product</a></h4>
                            </div>
                            @csrf
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary opacity-14">ID</th>
                                            <th class="text-secondary opacity-14">Image</th>
                                            <th class="text-secondary opacity-14">Name</th>
                                            <th class="text-secondary opacity-14">Category</th>
                                            <th class="text-secondary opacity-14">Price</th>
                                            <th class="text-secondary opacity-14">Edit</th>
                                            <th class="text-secondary opacity-14">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product )
                                        <tr>
                                            <td class="text-md font-weight-normal ps-4">{{$product->id }}</td>
                                            <td class="text-md font-weight-normal ps-4" style="width: 100px;">
                                                @if (count($product->images)>0)
                                                    @foreach ($product->images as $single_img)
                                                        @if($product->images->first()==$single_img)
                                                        <img src="/assets/uploads/products/carousel/{{ $single_img->image }}" class="img-thumbnail img-responsive">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-md font-weight-normal ps-4" style="color:#343a40">{{$product->name }}</td>
                                            <td class="text-md font-weight-normal ps-4">{{$product->category->name }}</td>
                                            <td class="text-md font-weight-normal ps-4">€ {{$product->selling_price }}</td>
                                            <td><a href="{{ url('products/edit/'.$product->id) }}" class="btn btn-outline-secondary">Edit</a></td>
                                            <td>
                                                <form action="{{ url('products/destroy/'.$product->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-primary" type="submit">Delete<i class="fas fa-trash ms-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
