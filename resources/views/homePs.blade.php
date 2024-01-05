@extends('layouts.template')
@section('content')
<h2>Dashboard</h2>
<p>Dashboard</p>
<div class="row text-center p-1 py-3"style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498); width: 95%;  margin-left: 30px;">
    @if (Session::get('failed'))
        <div class="alert alert-danger mt-2 mb-4">{{ Session::get('failed') }}</div>
    @endif

    <div class="col-md-6 mt">
        <div class="card p-4" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498);">
            <h5 class="card-title"> Peserta Didik Rayon {{ App\Models\rayons::find($rayonIdLogin)->rayon }}</h5>
            <div class="card-body">
                <h5><i class="fas fa-users"></i> {{ $totalStudents }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498);">
            <h5 class="card-title"> Jumlah Keterlambatan {{ App\Models\rayons::find($rayonIdLogin)->rayon }}</h5>
            <div class="card-body">
                <h5><i class="fas fa-users"></i> {{ $totalLates }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498);">
            <h5 class="card-title"> Keterlambatan {{ App\Models\rayons::find($rayonIdLogin)->rayon }} Hari ini </h5>
            <h5 class="card-title"> {{ \Carbon\Carbon::now()->format('Y-m-d') }} </h5>
            <div class="card-body">
                <h5><i class="fas fa-users"></i> {{ $todayLates }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
