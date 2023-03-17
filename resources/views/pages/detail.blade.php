@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <!-- breadcrumb -->
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </nav>
                        <!-- breadcrumb ends -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>
                            @if ($item->galleries->count())
                                <!-- Gallery -->
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom"
                                            id="xzoom-default"
                                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}" />
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($item->galleries as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                                    width="128" height="80"
                                                    xpreview="{{ Storage::url($gallery->image) }}" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <!-- Gallery Ends -->
                            <h2>Tentang Wisata</h2>
                            <p> {{ $item->about }}
                            </p>
                            <div class="row features">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/images/icon/ic_event.png') }}" alt="" /
                                        class="features-image">
                                    <div class="description">
                                        <h3>Feature Event</h3>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/icon/ic_language.png') }}" alt="" /
                                        class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/icon/ic_food.png') }}" alt="" /
                                        class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $item->foods }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/members/member_1.png') }}" alt=""
                                    class="member-image mr-1">
                                <img src="{{ url('frontend/images/members/member_2.png') }}" alt=""
                                    class="member-image mr-1">
                                <img src="{{ url('frontend/images/members/member_3.png') }}" alt=""
                                    class="member-image mr-1">
                                <img src="{{ url('frontend/images/members/member_4.png') }}" alt=""
                                    class="member-image mr-1">
                                <img src="{{ url('frontend/images/members/member_lain.png') }}" alt=""
                                    class="member-image mr-1">
                            </div>
                            <hr />
                            <h2>Trip Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width="50%">Date of Departure</th>
                                    <td width="50%" class="text-right">
                                        {{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    </th>
                                    <td width="50%" class="text-right">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">{{ $item->price }},00 / Person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout-process', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Join Now</button>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login or Register to Join
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <!-- xzoom -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWidth: 500,
                title: false,
                tint: "#333",
                Xoffset: 15,
            });
        });
    </script>
@endpush
