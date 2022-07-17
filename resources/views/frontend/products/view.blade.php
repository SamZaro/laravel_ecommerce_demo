@extends('layouts.front')
@section('title', $products->name)

@section('content')
<div class="container">
    <div id="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('category') }}">Categories</a></li>
              <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('category') }}">{{ $products->category->slug }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $products->slug }}</li>
            </ol>
        </nav>
        <div class="row">
            <div>
                <a href="{{ url('cart') }}" class="btn btn-white float-end" type="button" name="button"><h6><i class="fa fa-shopping-cart"><span class="badge badge-pill badge-lg bg-secondary cart-count mx-3">0</span></i>Items</h6></a>
            </div>
        </div>
        <div class="row">
            <div class="card card-body mt-0 product_data">
                <div class="section my-4 my-lg-5">
                    <div class="container">
                        <div class="row flex-row">
                            <div class="col-md-4">
                                <div id="carouselExampleIndicators" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($products->images as $single_img)
                                            <li data-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($products->images as $key => $single_img)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img class="d-block w-100" src="/assets/uploads/products/carousel/{{ $single_img->image }}" style="width:300px; height:300px;">
                                        </div>
                                        @endforeach
                                    <a class="carousel-control-prev bg-secondary" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next bg-secondary" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ms-4">
                                <!-- Product Name -->
                                <h3 class="mt-lg-0 mt-4">{{ $products->name }}</h3>

                                <!-- In Stock? -->
                                @if($products->qty > 0)
                                <span class="badge rounded-pill bg-success">In Stock</span>
                                @else
                                <span class="badge bg-gradient-danger">Out of Stock</span>
                                @endif

                                <hr>

                                <!-- Trending -->
                                @if($products->trending == '1')
                                <td>
                                    <label style="font-size: 10px;" class="float-end badge bg-info trending_tag">Trending</label>
                                </td>
                                @endif

                                <h6 class="mb-0 mt-2">Price</h6>
                                <span class="float-start text-success font-weight-large" style="padding-right: 10px;"><h3>{{ $products->selling_price }},-</h3></span>
                                <span class="text-secondary font-weight-bold"><s>{{ $products->original_price }}</s></span>

                                <!-- Accordion -->

                                <div class="accordion" id="accordionProduct">
                                    <div class="accordion-item mb-1">
                                        <h6 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-bottom font-weight-bold text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Description
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>
                                        </button>
                                        </h6>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                            <div class="accordion-body text-sm opacity-8">
                                                {{ $products->description }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-1">
                                        <h6 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button border-bottom font-weight-bold text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Designer Information
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>
                                        </button>
                                        </h6>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProduct">
                                            <div class="accordion-body text-sm opacity-8">
                                            An infusion of West Coast cool and New York attitude, Rebecca Minkoff is synonymous with It girl style. Minkoff burst on the fashion scene with her best-selling 'Morning After Bag' and later expanded her offering with the Rebecca Minkoff
                                            Collection - a range of luxe city staples with a "downtown romantic" theme.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quantity Button Group -->
                                <div class="row mt-4">
                                    <div class="col-md-3">

                                        <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                        <label for="Quantity">Quantity:</label>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary decrement-btn">-</button>
                                            <input type="text" style="width:50px; height:35px; border:none; " name="quantity" class="qty-input text-center" value="1">
                                            <button type="button" class="btn btn-secondary increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add to cart Button-->
                                <div class="col-lg-4 ms-auto">
                                <button class="btn bg-gradient-primary mb-0 mt-lg-auto w-100 addToCartBtn" type="button" name="button">Add to cart</button>
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
    </div>
</div>
@endsection
