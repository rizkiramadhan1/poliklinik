<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
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
            $pasien = Pasien::where('nama', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('gender', 'LIKE', "%$keyword%")
            ->orWhere('umur', 'LIKE', "%$keyword%")
            ->orWhere('telepon', 'LIKE', "%$keyword%")->paginate(10);
            
        }else{
            $pasien = Pasien::orderBy('id', 'DESC')->paginate(10);
        }

        return view('pasien.index', compact('pasien', 'keyword'));
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
        $tambah = new Pasien();
        $tambah->nama = $request['nama'];
        $tambah->alamat = $request['alamat'];
        $tambah->gender = $request['gender'];
        $tambah->umur = $request['umur'];
        $tambah->telepon = $request['telepon'];
        $tambah->save();

        return redirect()->to('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Pasien::where('id', $id)->first();
        return view('pasien.lihat', compact('lihat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Pasien::where('id', $id)->first();
        return view('pasien.edit', compact('edit'));
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
        $update = Pasien::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->alamat = $request['alamat'];
        $update->gender = $request['gender'];
        $update->umur = $request['umur'];
        $update->telepon = $request['telepon'];
        $update->update();

        return redirect()->to('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pasien::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/pasien');
    }
}
