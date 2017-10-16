<?php

namespace App\Http\Controllers;

use App\Poliklinik;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
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
            $poliklinik = Poliklinik::where('nama', 'LIKE', "%$keyword%")->paginate(10);
            
        }else{
            $poliklinik = Poliklinik::orderBy('id', 'DESC')->paginate(10);
        }

        return view('poliklinik.index', compact('poliklinik', 'keyword'));
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
        $tambah = new Poliklinik();
        $tambah->nama = $request['nama'];
        $tambah->save();

        return redirect()->to('/poliklinik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Poliklinik::where('id', $id)->first();
        return view('poliklinik.lihat', compact('lihat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Poliklinik::where('id', $id)->first();
        return view('poliklinik.edit', compact('edit'));

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
        $update = Poliklinik::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->update();

        return redirect()->to('/poliklinik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Poliklinik::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/poliklinik');
    }
}
