@extends('layout.dasar')
<!-- START FORM -->
@section('konten')

<form action='{{ url('crud/create') }}' method='post'>
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('crud') }}"class="btn btn-secondary" ><<<</a>
<div class="col-lg-12 margin-tb pt-2">
    <div class="pull-left">
        <h2> Dosen dan Tendik Sistem Informasi</h2>
    </div>
    </div>
    <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label pt-2" style="font-weight: 500">NIP</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='nip' id="nip">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label pt-2" style="font-weight: 500">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label pt-2" style="font-weight: 500">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' id="email">
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