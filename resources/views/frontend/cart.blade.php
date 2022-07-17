@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 style="color: white">Cart Items</h4>
                </div>
                @csrf

                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th class="text-secondary opacity-14">ID</th>
                                <th class="text-secondary opacity-14">Name</th>
                                <th class="text-secondary opacity-14">Category</th>
                                <th class="text-secondary opacity-12">Quantity</th>
                                <th class="text-secondary opacity-12">Price</th>
                                <th class="text-secondary opacity-12">Actions</th>
                                <th class="text-secondary opacity-12"></th>
                            </tr>
                        </thead>
                        @if($cartitems->count() > 0)
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($cartitems as $item)
                            <tr class="product_data">
                                <td class="text-md font-weight-normal ps-4">{{ $item->products->id }}</td>
                                <td class="text-md font-weight-normal ps-4" style="color:#343a40">{{ $item->products->name }}</td>
                                <td class="text-md font-weight-normal ps-4">{{ $item->products->category->name }}</td>
                                <td class="text-md font-weight-normal ps-4">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id}}">
                                    @if ($item->products->qty >= $item->prod_qty)
                                        <label for="Quantity"></label>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary changeQuantity decrement-btn">-</button>
                                            <input type="text" style="width:50px; height:35px; border:none; " name="quantity" class="qty-input text-center" value="{{ $item->prod_qty }}">
                                            <button type="button" class="btn btn-secondary changeQuantity increment-btn">+</button>
                                        </div>
                                        @php $total +=  $item->products->selling_price * $item->prod_qty ; @endphp
                                    @else
                                        <h6>Out of Stock</h6>
                                    @endif
                                </td>
                                <td class="text-md font-weight-normal ps-4">€ {{ $item->products->selling_price }}</td>
                                <td>
                                    <button class="btn btn-primary delete-cart-item">Delete <i class="fas fa-trash ms-2"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="float-end me-6">Total : € {{ $total }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn bg-gradient-success float-end me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Proceed to Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <div class="pt-4">
                            <h5>Your <i class="fa fa-shopping-cart"></i>Cart is empy</h5>
                            <a href="{{ url('category')}}" class="btn btn-primary float-end">Continue Shopping</a>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Modal Container -->
                <div class="container py-7">
                    <div class="row mt-5">
                      <div class="col-sm-3 col-6 mx-auto">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">This is a Demo Website!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Sorry, you can't proceed to real checkout as this website is just for demo purposes.
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn bg-gradient-success mb-0" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /#container -->
@endsection
