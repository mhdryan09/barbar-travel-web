@extends('layouts.checkout')

@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                        <!-- breadcrumb ends -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>Who is going?</h1>
                            <p>Trip to Danau Toba, Indonesia</p>
                            <div class="join-trip">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ url('frontend/images/checkout/ck_member_1.png') }}"
                                                    alt="">
                                            </td>
                                            <td class="align-middle">Ryan Pranata</td>
                                            <td class="align-middle">CN</td>
                                            <td class="align-middle">N/A</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <a href="#">
                                                    <img src="{{ url('frontend/images/checkout/Icon material-close.png') }}"
                                                        alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ url('frontend/images/checkout/ck_member_2.png') }}"
                                                    alt="">
                                            </td>
                                            <td class="align-middle">Rina</td>
                                            <td class="align-middle">SG</td>
                                            <td class="align-middle">30 Days</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <a href="#">
                                                    <img src="{{ url('frontend/images/checkout/Icon material-close.png') }}"
                                                        alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-4">
                                <h2>Add Member</h2>
                                <form action="" class="form-inline">
                                    <label for="inputUsername" class="sr-only">
                                        Name
                                    </label>
                                    <input type="text" name="inputUsername" class="form-control mb-2 mr-sm-2"
                                        id="inputUsername" placeholder="Username">

                                    <label for="inputVisa" class="sr-only">VISA</label>
                                    <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                                        <option value="VISA" selected>VISA</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="N/A">N/A</option>
                                    </select>

                                    <label for="doePassport" class="sr-only">DOE Passport</label>
                                    <div class="input-group-btn mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" id="doePassport"
                                            placeholder="DOE Passport">
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>

                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in Barbar
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">2 Person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional VISA</th>
                                    </th>
                                    <td width="50%" class="text-right">$190,00</td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">$80,00/person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Total Price</th>
                                    <td width="50%" class="text-right">$280,00</td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">$279,</span>
                                        <span class="text-orange">33</span>
                                    </td>
                                </tr>
                            </table>
                            <hr />
                            <h2>Payment Instruction</h2>
                            <p class="payment-instruction">
                                Please complete payment before you continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/checkout/ic_bank.png') }}" class="bank-image"
                                        alt="">
                                    <div class="description">
                                        <h3>PT Barbar Travel</h3>
                                        <p>
                                            0922 2211 3332
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout-success') }}" class="btn btn-block btn-join-now mt-3 py-2">I Have
                                Made
                                Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail') }}" class="text-muted">
                                Cancel Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('prepend-style')
    <!-- Gjigo -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/gjigo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/gjigo/js/gijgo.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $(".datepicker").datepicker({
        //         uiLibrary: 'bootstrap4',
        //         icons: {
        //             rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
        //         }
        //     });
        // });
        $(".datepicker").datepicker();
    </script>
@endpush
