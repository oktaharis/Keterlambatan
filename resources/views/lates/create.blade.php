@extends('layouts.template')
@section('content')
<div class="text" style="
            margin-top:20px;
            margin-left:20px;
            ">
    <h3>Data Keterlambatan</h3>
    <p>Data Terlambat / Tambah Data</p>
</div>

<div class="container">

    <div class="card bg-white border-0 shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-body">
            <form action="{{ route('admin.lates.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                @if (Session::get('success'))
                <div class="alert">{{ Session::get('success') }}</div>
                @endif
                @if ($errors->any())
                <ul>
                    <li>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach</li>
                </ul>
                @endif
                <label for="student_id" class="mt-3 mb-3">Siswa </label>
                <select class="form-select" aria-label="Default select example" name="student_id">
                    <option value="0" selected>Open this select menu</option>
                    @foreach ($students as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label mt-3 mb-3">Tanggal Keterlambatan</label>
                <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="date_time_late">

                <label for="exampleFormControlTextarea1" class="form-label mt-3 mb-3">Informasi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="information"></textarea>

                <label for="formFile" class="form-label">Bukti</label>
                <input class="form-control" type="file" id="bukti" name="bukti">

                <button type="submit" class="btn btn-primary mt-4">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection