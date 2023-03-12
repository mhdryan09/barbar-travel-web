@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
    <main>
        <section class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/images/ic_mail.png') }}" alt="" / class="mb-3">
                <h1>Yeay, Success</h1>
                <p>
                    We've sent you email for trip instruction <br />
                    please read it as well
                </p>
                <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-4"> Home Page</a>
            </div>
        </section>
    </main>
@endsection
