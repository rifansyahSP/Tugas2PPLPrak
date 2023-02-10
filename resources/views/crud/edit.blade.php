@extends('layout.dasar')
<!-- START FORM -->
@section('konten')

<form action='{{ url('crud/'.$data->nip) }}' method='post'>
@csrf
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('crud') }}"class="btn btn-secondary">Kembali</a>
    <div class="mb-3 row">
        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
            {{ $data->nip }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ $data->email }}" id="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection