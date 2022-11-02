@extends('layout.main')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br />
    @endif
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">TABEL ALTERNATIF</h5>
            <br>
            <table class="table-bordered table">
                <tr>
                    <th scope="col">Nama Alternatif</th>
                    @foreach ($kriteria as $item)
                        <th scope="col">{{ $item->nama }}</th>
                    @endforeach
                    <th colspan="2" class=" text-center"> AKSI </th>
                </tr>

                @foreach ($alternatif as $value)
                    <tr>
                        <td>{{ $value->nama_alternatif }}</td>
                        <td>{{ $value->sanksi_berorganisasi }}</td>
                        <td>{{ $value->status_keanggotaan }}</td>
                        <td>{{ $value->keaktifan }}</td>
                        <td>{{ $value->pengalaman }}</td>
                        <td>{{ $value->ijdk }}</td>
                        <td><a class="btn btn-info" href="{{ url('alternatif/' . $value->id . '/edit') }}"> Update</a></td>
                        <td class="text-center">
                            <form action="{{ url('alternatif/' . $value->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-info" href="{{ url('alternatif/create') }}">Tambah</a>
        </div>
    </div>
@endsection
