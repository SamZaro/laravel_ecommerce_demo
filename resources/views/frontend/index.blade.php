@extends('layouts.front')

@section('content')

<div id="wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 mt-6">
                    <div class="jumbotron">
                        <h1 class="display-4">My E-Commerce</h1>

                        <p class="lead">Je gebruikt deze Jumbotron als blikvanger. Een soort van <a href="">Call to action</a> functie.<br>
                            En dan te compilen naar je css. In deze ruimte kan je ook gelijk even letten
                            op je root padding en margin voor <a href="">articles</a> en <a href="">blogs</a>.<p>
                        </p>
                        <a class="btn btn-primary btn-lg">Learn more..</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h3>Featured Products</h3>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach($featured_products as $prod )
                            <div class="carousel-item active" style="background-color: #fff; padding: 0px;">
                                @if (count($prod->images)>0)
                                @foreach ($prod->images as $single_img)
                                    @if($prod->images->first()==$single_img)
                                    <img src="/assets/uploads/products/carousel/{{ $single_img->image }}" class="img-thumbnail img-responsive" height="150" width="150" style="margin-right: 20px;">
                                    @endif
                                @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
<script>
$('.featured-carousel').owlCarousel({
    loop:true,
    autoplay: true,
    autoplayTimeout: 4000,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection
