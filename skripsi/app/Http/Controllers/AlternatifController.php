<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AlternatifRequest;
use App\Models\alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = alternatif::all();
        $kriteria = Kriteria::all();
        $nilai_alternatif = NilaiAlternatif::all();
        return view('alternatif', ['kriteria'=>$kriteria,'alternatif'=>$alternatif,'nilai_alternatif'=>$nilai_alternatif]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        return view('tambah_alternatif', ['kriteria'=>$kriteria,'alternatif'=>$alternatif]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new alternatif;
        $data->nama_alternatif = $request->nama_alternatif;
        $data->save();
        foreach (Kriteria::all() as $kriteria) {
            $flight = NilaiAlternatif::create([
                'id_kriteria' => $kriteria->id,
                'id_user' => $data->id,
                'nilai' => $request->input(str_replace(' ', '_', $kriteria->nama)),
            ]);
        }
        return "berhasil";
        // return redirect('alternatif')->with('success',"Data Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = alternatif::find($id);
        return view('edit_alternatif',compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlternatifRequest $request, $id)
    {
        $model = alternatif::find($id);
        $model->nama_alternatif = $request->nama_alternatif;
        $model->sanksi_berorganisasi = $request->sanksi_berorganisasi;
        $model->status_keanggotaan = $request->status_keanggotaan;
        $model->keaktifan = $request->keaktifan;
        $model->pengalaman = $request->pengalaman;
        $model->ijdk = $request->ijdk;
        $model->save();
        return redirect('alternatif')->with('success',"Data Berhasil diUpdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = alternatif::find($id);
        $model->delete();
        return redirect('alternatif')->with('success',"Data Berhasil Dihapus");
    }
}
