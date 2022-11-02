@extends('layout.main')

@section('content')
    <br/>
    
    <form method="POST" action="{{ url('kriteria') }}">
        @csrf 
        @include('layout.form_editkriteria')
        {{-- Nama : <input type="text" name="nama"><br>
        Atribut: <input type="text" name="atribut"><br>
        <button type="submit"> SIMPAN</button> --}}
    </form>
@endsection