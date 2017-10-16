<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Resep;
use App\Pasien;
use App\Poliklinik;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $resep = Resep::where('tgl', 'LIKE', "%$keyword%")
            ->orWhere('total_harga', 'LIKE', "%$keyword%")
            ->orWhere('bayar', 'LIKE', "%$keyword%")
            ->orWhere('kembali', 'LIKE', "%$keyword%")
            ->orWhereHas('dokter', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })
            ->orWhereHas('pasien', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })
            ->orWhereHas('poliklinik', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(10);
            
        }else{
            $resep = Resep::orderBy('id', 'DESC')->paginate(10);
        }  

        $dokter = Dokter::orderBy('nama', 'ASC')->get();
        $pasien = Pasien::orderBy('nama', 'ASC')->get();
        $poliklinik = Poliklinik::orderBy('nama', 'ASC')->get();

        return view('resep.index', compact('resep', 'keyword', 'dokter', 'pasien', 'poliklinik'));
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
        //
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
