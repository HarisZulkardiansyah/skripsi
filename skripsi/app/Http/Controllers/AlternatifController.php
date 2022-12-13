<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\alternatif;
use Illuminate\Http\Request;
use App\Models\NilaiAlternatif;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlternatifRequest;

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
        return redirect('alternatif')->with('success',"Data Berhasil Disimpan");
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
        $alternatif = alternatif::where('id',$id)->first();
        $kriteria = Kriteria::all();
        $nilai_alternatif = NilaiAlternatif::where('id_user', $id)->get();
        return view('edit_alternatif', ['kriteria'=>$kriteria,'alternatif'=>$alternatif,'nilai_alternatif'=>$nilai_alternatif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternatif = alternatif::find($id);
        $alternatif->nama_alternatif = $request->nama_alternatif;
        $alternatif->save();
        foreach (Kriteria::all() as $kriteria) {

            $temp = NilaiAlternatif::where('id_user', $id)
            ->where('id_kriteria',$kriteria->id)
            ->update([
                'id_kriteria' => $kriteria->id,
                'id_user' => $id,
                'nilai' => $request->input(str_replace(' ', '_', $kriteria->nama)),
            ]);  
        }
        return redirect('alternatif')->with('success',"Data Berhasil Di-update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = alternatif::find($id);
        $alternatif->delete();
        $deleted = DB::table('nilai_alternatif')->where('id_user', $id)->delete();
        return redirect('alternatif')->with('success',"Data Berhasil Dihapus");
    }
}
