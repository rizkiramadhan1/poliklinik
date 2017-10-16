<?php

namespace App\Http\Controllers;

use App\Poliklinik;
use App\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $dokter = Dokter::where('kode_dokter', 'LIKE', "%$keyword%")->orWhere('nama', 'LIKE', "%$keyword%")
            ->orWhere('spesialis', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('telpon', 'LIKE', "%$keyword%")
            ->orWhere('tarif', 'LIKE', "%$keyword%")
            ->orWhereHas('poliklinik', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(10);
            
        }else{
            $dokter = Dokter::orderBy('kode_dokter', 'DESC')->paginate(10);
        }  

        $poliklinik = Poliklinik::orderBy('nama', 'ASC')->get();

        return view('dokter.index', compact('dokter', 'keyword', 'poliklinik'));
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
        $this->validate($request, [
              'kode_dokter' => 'required|unique:dokter',
        ]);

        $tambah = new Dokter();
        $tambah->kode_dokter = $request['kode_dokter'];
        $tambah->nama = $request['nama'];
        $tambah->spesialis = $request['spesialis'];
        $tambah->alamat = $request['alamat'];
        $tambah->telepon = $request['telepon'];
        $tambah->poliklinik_id = $request['poliklinik_id'];
        $tambah->tarif = $request['tarif'];
        $tambah->save();

        return redirect()->to('/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Dokter::where('id', $id)->first();
        return view('dokter.lihat', compact('lihat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Dokter::where('id', $id)->first();
        $poliklinik = Poliklinik::orderBy('nama', 'ASC')->get();
        return view('dokter.edit', compact('edit', 'poliklinik'));
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
        $update = Dokter::where('id', $id)->first();
        $update->kode_dokter = $request['kode_dokter'];
        $update->nama = $request['nama'];
        $update->spesialis = $request['spesialis'];
        $update->alamat = $request['alamat'];
        $update->telepon = $request['telepon'];
        $update->poliklinik_id = $request['poliklinik_id'];
        $update->tarif = $request['tarif'];
        $update->update();

        return redirect()->to('/dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Dokter::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/dokter');
    }
}
