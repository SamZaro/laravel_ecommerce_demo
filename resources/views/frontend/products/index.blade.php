@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="container">
    <div id="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('category') }}">Categories</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($products as $prod )
                <div class="col">
                    <span>
                        <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                            <div class="card h-100" style="margin-top:20px;">
                                @if (count($prod->images)>0)
                                    @foreach ($prod->images as $single_img)
                                        @if($prod->images->first()==$single_img)
                                        <img src="/assets/uploads/products/carousel/{{ $single_img->image }}" style="height:200px; max-width:300px" alt="Card image cap" srcset="">
                                        @endif
                                    @endforeach
                                @endif
                                <div class="card-body" style="height:20px;">
                                    <h6 class="card-title">{{ $prod->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </span>
                </div>
            @endforeach
        </div>

    </div>
    <!-- /#wrapper -->
</div> <!-- /#container -->
@endsection
