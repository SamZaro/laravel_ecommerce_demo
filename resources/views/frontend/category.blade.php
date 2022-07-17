@extends('layouts.front')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container">
        <div id="wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                  <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($category as $cate)
                    <div class="col">
                        <a href="{{ url('category/'.$cate->slug) }}">
                            <div class="card h-100" style="margin-top:20px;">
                                <img class="card-img-top" src="assets/uploads/category/{{ $cate->image }}" style="height:200px; max-width:300px" alt="Card image cap" srcset="">
                                <div class="card-body" style="height:20px;">
                                    <h6 class="card-title">{{ $cate->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
