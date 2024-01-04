@extends('layouts.template')

@section('content')
    <form action="{{ route('rayons.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))    
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Pembimbing Siswa :</label>
            <div class="col-sm-10">
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option selected hidden disabled>Pilih Pembimbing Siswa</option>
                        <option value="{{ $user->id }}">{{ $user['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection