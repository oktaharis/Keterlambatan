@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <main class="content px-3 py-2" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498);">
        @if (Session::get('canAccess'))
            <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
        @endif
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif

        @if (Session::get('sudah'))
            <div class="alert alert-danger">{{ Session::get('sudah') }}</div>
        @endif
        @if (Auth::check() && Auth::user()->role == "admin")
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Dashboard </h4>
            </div>
            <div class="row">
                <div class="container px-4 ">
                    <div class="row g-3 my-2 mb-4">
                        <div class="col-md-6">
                                <div
                                    class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                    <div>
                                        <h3 class="fs-2">{{ $jumlah_data_students }}</h3>
                                        <p class="fs-5">Peserta Didik</p>
                                    </div>
                                    <i class="ri-user-fill fs-1"></i>
                                </div>
                        </div>
                        @php
                        $admin = 0;
                        $ps = 0;

                        foreach ($data_users as $user) {
                        if ($user['role'] === 'admin') {
                        $admin++;
                        } elseif ($user['role'] === 'ps') {
                        $ps++;
                        }
                        }
                        @endphp

                        <div class="col-md-3">
                             <div
                                  class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                  <div>
                                       <h3 class="fs-2">{{ $admin }}</h3>
                                       <p class="fs-5">Admin</p>
                                  </div>
                                  <i class="ri-user-fill fs-1"></i>
                             </div>
                        </div>
                        <div class="col-md-3">
                             <div
                                  class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                  <div>
                                       <h3 class="fs-2">{{ $ps }}</h3>
                                       <p class="fs-5">Pemb Siswa</p>
                                  </div>
                                  <i class="ri-user-fill fs-1"></i>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">{{ $jumlah_data_rombels }}</h3>
                                    <p class="fs-5">Rombel</p>
                                </div>
                                <i class="ri-bookmark-fill fs-1"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">{{ $jumlah_data_rayons }}</h3>
                                    <p class="fs-5">Rayon</p>
                                </div>
                                <i class="ri-bookmark-fill fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @else
            <div class="row">
                <h2>Dashboard</h2>
                <p>Dashboard</p>
                @if (Session::get('failed'))
                    <div class="alert alert-danger mt-2 mb-4">{{ Session::get('failed') }}</div>
                @endif
                <div class="col-md-6">
                    <div class="card p-4">
                        <h4 class="card-title"> Peserta Didik Rayon {{ App\Models\rayons::find($rayonIdLogin)->rayon }}</h4>
                        <div class="card-body">
                            <h4><i class="fas fa-users"></i> {{ $totalStudents }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h4 class="card-title"> Jumlah Keterlambatan {{ App\Models\rayons::find($rayonIdLogin)->rayon }}</h4>
                        <div class="card-body">
                            <h4><i class="fas fa-users"></i> {{ $totalLates }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h4 class="card-title"> Keterlambatan {{ App\Models\rayons::find($rayonIdLogin)->rayon }} Hari ini </h4>
                        <h4 class="card-title"> {{ \Carbon\Carbon::now()->format('Y-m-d') }} </h4>
                        <div class="card-body">
                            <h4><i class="fas fa-users"></i> {{ $todayLates }}</h4>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endif
    </main>

    {{-- <a href="#" class="theme-toggle" onclick="toggleTheme()">
         <i class="fa-regular fa-moon"></i>
    </a> --}}

    <script src="{{ asset('js/script.js') }}"></script>
@endsection
