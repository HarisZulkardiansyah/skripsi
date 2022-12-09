<?php

namespace App\Http\Controllers;

use App\Models\BobotAhp;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BobotAhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $bobot_ahp = BobotAhp::all();

        return view('bobot_kriteria',['kriteria'=>$kriteria,'bobot_ahp'=>$bobot_ahp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->id_kriteria1 == $request->id_kriteria2){
        //     return redirect()->route('bobot_ahp')->with('error','Gagal, Kriteria Harus Berbeda !');
        // }
        $bobot_ahp = BobotAhp::where('id_kriteria1', $request->id_kriteria1)->where('id_kriteria2',$request->id_kriteria2)->first();
        if ($bobot_ahp != null){
            $bobot_ahp = BobotAhp::where('id_kriteria1', $request->id_kriteria1)
                    ->where('id_kriteria2', $request->id_kriteria2)
                    ->update(['skala_pembanding' => $request->skala_pembanding]);
            return redirect()->route('bobot_ahp')->with('success','Data Berhasil Di-Update');
        }else{
            $bobot_ahp = BobotAhp::create([
                'id_kriteria1' => $request->id_kriteria1,
                'id_kriteria2' => $request->id_kriteria2,
                'skala_pembanding' => $request->skala_pembanding,
            ]);
            return redirect()->route('bobot_ahp')->with('success','Data Berhasil Disimpan');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
