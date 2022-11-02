@extends('layout.main')

@section('content')
    <br/>
    <form method="POST" action="{{ url('alternatif/'.$model->id) }}">
        @csrf 
        <input type= "hidden" name="_method" value="PATCH">
        @include('layout.form_editalternatif')
        {{-- Nama : <input type="text" name="nama_alternatif" value="{{$model->nama_alternatif}}"><br><br>
        Sanksi Berorganisasi: <input type="integer" name="sanksi_berorganisasi" value="{{$model->sanksi_berorganisasi}}"><br><br>
        Status Keanggotaan: <input type="integer" name="status_keanggotaan" value="{{$model->status_keanggotaan}}"><br><br>
        Keaktifan: <input type="integer" name="keaktifan" value="{{$model->keaktifan}}"><br><br>
        Pengalaman: <input type="integer" name="pengalaman" value="{{$model->pengalaman}}"><br><br>
        IJDK: <input type="integer" name="ijdk" value="{{$model->ijdk}}"><br><br>
        <button type="submit"> SIMPAN</button> --}}
    </form>
@endsection