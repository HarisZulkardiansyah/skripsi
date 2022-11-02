@extends('layout.main')

@section('content')
    <br/>
    <form method="POST" action="{{ url('kriteria/'.$model->id) }}">
        @csrf 
        <input type= "hidden" name="_method" value="PATCH">
        {{-- Nama : <input type="text" name="nama" value="{{$model->nama}}"><br><br>
        Atribut: <input type="text" name="atribut" value="{{$model->atribut}}"><br><br>
        <button type="submit"> SIMPAN</button> --}}
        @include('layout.form_editkriteria')
    </form>
@endsection