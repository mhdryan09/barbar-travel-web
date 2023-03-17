@extends('layouts.app')

@section('title')
    Barbar Travel
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>
            Explore the Beautiful World
            <br />
            As Easy One Click
        </h1>
        <p class="mt-3">
            You will see beautiful
            <br />
            moment that you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4"> Get Started </a>
    </header>
    <!-- Header Ends -->

    <!-- Konten Utama -->
    <main>
        <!-- statistik -->
        <div class="container">
            <section class="section-stat row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stat-details">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stat-details">
                    <h2>7K</h2>
                    <p>Partners</p>
                </div>
                <div class="col-3 col-md-2 stat-details">
                    <h2>10K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stat-details">
                    <h2>6K</h2>
                    <p>countries</p>
                </div>
            </section>
        </div>
        <!-- statistik Ends -->

        <!-- Wisata Popular -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Something that you never try<br />
                            before this world.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wisata Popular Ends -->

        <!-- Wisata Popular Content -->
        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="
                                  background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');
                              ">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Wisata Popular Content Ends -->

        <!-- Our Networks -->
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us <br />
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/logo_partners.png" alt="Logo Partner" class="img-partner" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Networks Ends -->

        <!-- Testimonials -->
        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments were giving them <br />
                            the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Ends -->

        <!-- Testimonials Content -->
        <section class="section-testimonial-content" id="testimonialsContent">
            <div class="container">
                <div class="row section-popular-travel justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonials text-center">
                            <div class="testimonials-content">
                                <img src="frontend/images/user_pic_1.png" alt="user 1" class="rounded-circle mb-4" />
                                <h3 class="mb-4">Ryan Pranata</h3>
                                <p class="testimonial">
                                    "It was glorius and I could not stop to
                                    say wohooo for every single moment
                                    Dankeeee"
                                </p>
                            </div>
                            <hr />
                            <div class="trip-to mt-2">Trip to Ubud</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonials text-center">
                            <div class="testimonials-content">
                                <img src="frontend/images/user_pic_2.png" alt="user 1" class="rounded-circle mb-4" />
                                <h3 class="mb-4">Yudhia Ayu</h3>
                                <p class="testimonial">
                                    "It was glorius and I could not stop to
                                    say wohooo for every single moment
                                    Dankeeee"
                                </p>
                            </div>
                            <hr />
                            <div class="trip-to mt-2">
                                Trip to Danau toba
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonials text-center">
                            <div class="testimonials-content">
                                <img src="frontend/images/user_pic_3.png" alt="user 1" class="rounded-circle mb-4" />
                                <h3 class="mb-4">Rifky Prawira</h3>
                                <p class="testimonial">
                                    "It was glorius and I could not stop to
                                    say wohooo for every single moment
                                    Dankeeee"
                                </p>
                            </div>
                            <hr />
                            <div class="trip-to mt-2">
                                Trip to Trawangan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">Need Help</a>
                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Content Ends -->
    </main>
    <!-- Konten Utama Ends -->
@endsection
