<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AlternatifRequest;
use App\Models\alternatif;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = alternatif::all();
        return view('alternatif', compact(
            'data'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new alternatif;
        return view('tambah_alternatif', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlternatifRequest $request)
    {
        $model = new alternatif;
        $model->nama_alternatif = $request->nama_alternatif;
        $model->sanksi_berorganisasi = $request->sanksi_berorganisasi;
        $model->status_keanggotaan = $request->status_keanggotaan;
        $model->keaktifan = $request->keaktifan;
        $model->pengalaman = $request->pengalaman;
        $model->ijdk = $request->ijdk;

        $model->save();
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
