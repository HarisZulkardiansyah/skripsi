@extends('layout.main')

@section('content')
    <br/>
    <form method="POST" action="{{ url('alternatif') }}">
        @csrf 
        @include('layout.form_editalternatif')
        {{-- Nama: <input type="text" name="nama_alternatif"><br>
        Sanksi Berorganisasi: <input type="text" name="sanksi_berorganisasi"><br>
        Status Keanggotaan: <input type="text" name="status_keanggotaan"><br>
        Keaktifan: <input type="text" name="keaktifan"><br>
        Pengalaman: <input type="text" name="pengalaman"><br>
        IJDK: <input type="text" name="ijdk"><br>
        <button type=""> SIMPAN</button> --}}
    </form>
@endsection