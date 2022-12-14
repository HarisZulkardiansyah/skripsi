@extends('layout.main')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br />
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p><br />
    @endif
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Matriks Perbandingan Kriteria
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Pertama-tama menyusun hirarki dimana diawali dengan tujuan, kriteria dan alternatif-alternatif lokasi
                        pada tingkat paling bawah. Selanjutnya menetapkan perbandingan berpasangan antara kriteria-kriteria
                        dalam bentuk matrik. Nilai diagonal matrik untuk perbandingan suatu elemen dengan elemen itu sendiri
                        diisi dengan bilangan (1) sedangkan isi nilai perbandingan antara (1) sampai dengan (9)
                        kebalikannya, kemudian dijumlahkan perkolom. Data matrik tersebut seperti terlihat pada tabel
                        berikut.</p>
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
                                    <?php $total = 0; ?>
                                    <tr>
                                        <th>{{ $nama_kriteria[$i] }}</th>
                                        @foreach ($bobot_ahp as $item_ahp)
                                            @if ($item_ahp->id_kriteria1 == $id_kriteria[$i] || $item_ahp->id_kriteria2 == $id_kriteria[$i])
                                                @if ($item_ahp->id_kriteria1 == $id_kriteria[$i] && $item_ahp->id_kriteria2 == $id_kriteria[$i])
                                                    <th class="bg-success text-white">{{ $item_ahp->skala_pembanding }}</th>
                                                @elseif(($item_ahp->id_kriteria2 == $id_kriteria[$i] > $item_ahp->id_kriteria1) == $id_kriteria[$i])
                                                    <?php $total += number_format(1 / $item_ahp->skala_pembanding, 2); ?>
                                                    <th>{{ number_format(1 / $item_ahp->skala_pembanding, 2) }}</th>
                                                    <?php $kode++; ?>
                                                @else
                                                    <th class="bg-danger text-white">{{ $item_ahp->skala_pembanding }}</th>
                                                    <?php $kode--; ?>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                @endfor
                                <?php $total2 = 0; ?>
                                @foreach ($bobot_ahp as $item_ahp)
                                    @if ($item_ahp->id_kriteria1 == 6)
                                        @if ($item_ahp->id_kriteria1 == 6 && $item_ahp->id_kriteria2 == 6)
                                            <?php $total2 += 1; ?>
                                        @elseif(($item_ahp->id_kriteria2 == 6 > $item_ahp->id_kriteria1) == 6)
                                            <?php $total2 += number_format(1 / $item_ahp->skala_pembanding, 2); ?>
                                        @else
                                            <?php $total2 += 1 / $item_ahp->skala_pembanding; ?>
                                        @endif
                                    @endif
                                @endforeach
                                <th>Total</th>
                                <th>{{ $total2 }}</th>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Matriks Bobot Kriteria
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Setelah terbentuk matrik perbandingan maka dilihat bobot prioritas untuk perbandingan kriteria.
                        Dengan cara membagi isi matriks perbandingan dengan jumlah kolom yang bersesuaian, kemudian
                        menjumlahkan perbaris setelah itu hasil penjumlahan dibagi dengan banyaknya kriteria sehingga
                        ditemukan bobot prioritas seperti terlihat pada berikut.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse
                    plugin adds the appropriate classes that we use to style each element. These classes control the overall
                    appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                    custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go
                    within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    </div>
@endsection
