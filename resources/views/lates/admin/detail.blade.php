@extends('layouts.template')

@section('content')
<h2>Detail Data Keterlambatan</h2>
<p><a href="#">Dashboard</a> / <a href="#">Data Keterlambatan</a> / Detail Data Keterlambatan</p>
<br>
<div class="container py-5">
    <h5 class="text-start text-muted">{{ $student->nis }} | {{ $student->name }} | {{ $student->rombels->rombel }} | {{
        $student->rayons->rayon }}</h5>
    <br>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($lates as $index => $late)
        <div class="col">
            <div class="card">
                <div class="card-body text-start">
                    <h5 class="card-title">Keterlambatan Ke-{{ $index + 1 }}</h5>
                    <div class="p-2">
                        <strong class="text-muted">{{ $late->date_time_late }}</strong>
                        <p>{{ $late->information }}</p>
                        <img src="{{ asset('images/' . $late['bukti']) }}" class="card-img-top" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        background-color: aliceblue;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        opacity: 1;
        overflow-y: scroll;
        margin: 0;
    }

    img {
        aspect-ratio: 3/2;
        object-fit: contain;
        max-width: 100%;
    }

    .card p {
        color: #0D6EFD;
        font-weight: 600;
    }

    .card-img-top {
        border-radius: 15px;
        padding: 0.1rem;
    }

    .card {
        border-radius: 30px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
    }

    .card-body {
        padding: 25px;
        margin-top: -15px;
    }

    .btn-primary {
        border-radius: 50px;
        width: 120px;
    }

    .btn-primary:hover {
        background-color: black;
        border: none;
    }

    h3,
    h5 {
        color: rgba(107, 107, 107, 0.845);
    }

    /* Additional styles for arranging cards side by side */
</style>
@endsection