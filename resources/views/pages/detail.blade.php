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
                            <h1>Nusa Penida</h1>
                            <p>Republic of Indonesia Raya</p>
                            <!-- Gallery -->
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="frontend/images/gallery/gallery-utama.jpg" class="xzoom" id="xzoom-default"
                                        xoriginal="frontend/images/gallery/gallery-utama.jpg" />
                                </div>
                                <div class="xzoom-thumbs">
                                    <a href="frontend/images/gallery/gallery-utama.jpg">
                                        <img src="frontend/images/gallery/gallery-utama.jpg" class="xzoom-gallery"
                                            width="128" height="80"
                                            xpreview="frontend/images/gallery/gallery-utama.jpg" />
                                    </a>
                                    <a href="frontend/images/gallery/thumbs/pic_2.jpg">
                                        <img src="frontend/images/gallery/gambar2.jpg" class="xzoom-gallery" width="128"
                                            height="80" xpreview="frontend/images/gallery/gambar2.jpg" />
                                    </a>
                                    <a href="frontend/images/gallery/thumbs/pic_3.jpg">
                                        <img src="frontend/images/gallery/thumbs/pic_3.jpg" class="xzoom-gallery"
                                            width="128" height="80" xpreview="frontend/images/gallery/gambar3.jpg" />
                                    </a>
                                    <a href="frontend/images/gallery/thumbs/pic_4.jpg">
                                        <img src="frontend/images/gallery/thumbs/pic_4.jpg" class="xzoom-gallery"
                                            width="128" height="80" xpreview="frontend/images/gallery/gambar4.jpg" />
                                    </a>
                                    <a href="frontend/images/gallery/gallery-utama.jpg">
                                        <img src="frontend/images/gallery/gallery-utama.jpg" class="xzoom-gallery"
                                            width="128" xpreview="frontend/images/gallery/gallery-utama.jpg" />
                                    </a>
                                </div>
                            </div>
                            <!-- Gallery Ends -->
                            <h2>Tentang Wisata</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus error odit sequi,
                                corporis doloremque nisi itaque quos. Atque delectus non laborum ut laboriosam autem
                                perspiciatis in aut a facilis commodi porro consequuntur, dicta adipisci. Ipsum
                                velit debitis ex obcaecati esse?
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum mollitia officia eaque,
                                nihil consectetur enim sequi ratione sint sunt quibusdam.
                            </p>
                            <div class="row features">
                                <div class="col-md-4">
                                    <img src="frontend/images/icon/ic_event.png" alt="" / class="features-image">
                                    <div class="description">
                                        <h3>Feature Event</h3>
                                        <p>Tari Kecak</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="frontend/images/icon/ic_language.png" alt="" / class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>Bahasa Indonesia</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="frontend/images/icon/ic_food.png" alt="" / class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>Local Food</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="frontend/images/members/member_1.png" alt="" class="member-image mr-1">
                                <img src="frontend/images/members/member_2.png" alt="" class="member-image mr-1">
                                <img src="frontend/images/members/member_3.png" alt="" class="member-image mr-1">
                                <img src="frontend/images/members/member_4.png" alt="" class="member-image mr-1">
                                <img src="frontend/images/members/member_lain.png" alt="" class="member-image mr-1">
                            </div>
                            <hr />
                            <h2>Trip Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width="50%">Date of Departure</th>
                                    <td width="50%" class="text-right">22 Aug, 2021</td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    </th>
                                    <td width="50%" class="text-right">4D 3N</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">Open Trip</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">$80,00 / person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout') }}" class="btn btn-block btn-join-now mt-3 py-2">Join Now</a>
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
