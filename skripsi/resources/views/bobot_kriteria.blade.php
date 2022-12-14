@extends('layout.main')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br />
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p><br />
    @endif
    <form class="mb-4" action="{{ route('bobot_ahp_up') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-select" name="id_kriteria1">
                        @foreach ($kriteria as $item_kriteria)
                            <option value="{{ $item_kriteria->id }}">{{ $item_kriteria->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-select" name="skala_pembanding">
                        <option value="1">1 - Sama penting dengan</option>
                        <option value="2">2 - Mendekati sedikit lebih penting dari</option>
                        <option value="3">3 - Sedikit lebih penting dari</option>
                        <option value="4">4 - Mendekati lebih penting dari</option>
                        <option value="5">5 - Lebih penting dari</option>
                        <option value="6">6 - Mendekati sangat penting dari</option>
                        <option value="7">7 - Sangat penting dari</option>
                        <option value="8">8 - Mendekati mutlak dari</option>
                        <option value="9">9 - Mutlak sangat penting dari</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-select" name="id_kriteria2">
                        @foreach ($kriteria as $item_kriteria)
                            <option value="{{ $item_kriteria->id }}">{{ $item_kriteria->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Ubah</button>
                </div>
            </div>
        </div>
    </form>
    <h1>Sblm Normalisasi</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    @foreach ($kriteria as $item_kriteria)
                        <th>{{ $item_kriteria->nama }}</th>
                        <?php $nama_kriteria[$loop->index] = $item_kriteria->nama; ?>
                        <?php $id_kriteria[$loop->index] = $item_kriteria->id; ?>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < count($nama_kriteria); $i++)
                    <tr>
                        <th>{{ $nama_kriteria[$i] }}</th>
                        @foreach ($bobot_ahp as $item_ahp)
                            @if ($item_ahp->id_kriteria1 == $id_kriteria[$i] || $item_ahp->id_kriteria2 == $id_kriteria[$i])
                                <th>{{ $item_ahp->skala_pembanding }}</th>
                            @endif
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <h1>Sesudah Normalisasi</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    @foreach ($kriteria as $item_kriteria)
                        <th>{{ $item_kriteria->nama }}</th>
                        <?php $nama_kriteria[$loop->index] = $item_kriteria->nama; ?>
                        <?php $id_kriteria[$loop->index] = $item_kriteria->id; ?>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < count($nama_kriteria); $i++)
                    <?php $kode = 1; ?>
                    <tr>
                        <th>{{ $nama_kriteria[$i] }}</th>
                        @foreach ($bobot_ahp as $item_ahp)
                            @if ($item_ahp->id_kriteria1 == $id_kriteria[$i] || $item_ahp->id_kriteria2 == $id_kriteria[$i])
                                @if ($item_ahp->id_kriteria1 == $id_kriteria[$i] && $item_ahp->id_kriteria2 == $id_kriteria[$i])
                                    <th class="bg-success text-white">{{ $item_ahp->skala_pembanding }}</th>
                                @elseif(($item_ahp->id_kriteria2 == $id_kriteria[$i] > $item_ahp->id_kriteria1) == $id_kriteria[$i])
                                    <th>{{ 1 / $item_ahp->skala_pembanding }}</th>
                                    <?php $kode++; ?>
                                @else
                                    <th class="bg-danger text-white">{{ $item_ahp->skala_pembanding }}</th>
                                    <?php $kode--; ?>
                                @endif
                            @endif
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
