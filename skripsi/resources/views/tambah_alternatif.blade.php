@extends('layout.main')

@section('content')
    <br />
    <form method="POST" action="{{ url('alternatif') }}">

        @csrf
        <div class="row clearfix">
            <div class="col-md-6">Nama Alternatif</div>

            <div class="col-md-6">
                <input class="form-control" type="text" name="nama_alternatif">
                @foreach ($errors->get('nama_alternatif') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        @foreach ($kriteria as $key_kriteria)
            <div class="row clearfix">
                <div class="col-md-6">{{ $key_kriteria->nama }}</div>
                <div class="col-md-6">
                    <input class="form-control" type="number" name="{{ $key_kriteria->nama }}"
                        value="{{ $key_kriteria->nilai }}">
                    @foreach ($errors->get($key_kriteria->nama) as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                </div>
            </div>
        @endforeach


        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
@endsection
