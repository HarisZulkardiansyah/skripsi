<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use PhpParser\Node\Expr\New_;
use App\Http\Requests\KriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kriteria::all();
        return view('kriteria',compact(
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
        $model = new kriteria;
        return view('tambah_kriteria',compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaRequest $request)
    {
        $model = new kriteria;
        $model->nama =$request->nama;
        $model->atribut =$request->atribut;
        $model->save();

        return redirect('kriteria')->with('success','Data Berhasil Disimpan');
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
        $model = kriteria::find($id);
        return view('edit_kriteria', compact(
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
    public function update(KriteriaRequest $request, $id)
    {
        $model = kriteria::find($id);
        $model->nama =$request->nama;
        $model->atribut =$request->atribut;
        $model->save();

        return redirect('kriteria')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $model = kriteria::find($id);
            $model->delete();
            return redirect('kriteria')->with('success','Data Berhasil Dihapus');
    }
}
