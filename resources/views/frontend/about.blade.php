@extends('layouts.front')

@section('content')
    <div class="container">
        <div id="wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                  <li class="breadcrumb-item" style="font-weight:700;"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
            <!-- -------- START Features w/ icons and text on left & gradient title and text on right -------- -->
            <section class="py-9">
                <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                    <h3>About Us</h3>
                    <p class="pe-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.  </p>
                    <a href="javascript:;" class="text-primary icon-move-right">More about us
                        <i class="fas fa-arrow-right text-sm ms-1"></i>
                    </a>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0">
                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                        <i class="fas fa-ship opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                        <p class="mb-0">It becomes harder for us to give others a hand. <br> We get our heart broken by people we love.</p>
                        </div>
                    </div>

                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                        <i class="fas fa-handshake opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                        <p class="mb-0">As we live, our hearts turn colder. <br>Cause pain is what we go through as we become older.</p>
                        </div>
                    </div>
                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                        <i class="fas fa-hourglass opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                        <p class="mb-0">When we lose family over time. <br> What else could rust the heart more over time? Blackgold.</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
            <!-- -------- END Features w/ icons and text on left & gradient title and text on right -------- -->
            <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
