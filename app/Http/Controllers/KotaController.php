<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
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

    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index',compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required|max:30|min:3|alpha',
            'id_provinsi' => 'required',
          ], [
            'id_provinsi.required' => 'Provinsi harus di pilih ',
            'nama.required' => 'Nama kota harus di isi ',
          ]);

        $kota= new Kota();
        $kota->nama_kota = $request->nama;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
            ->with(['message'=>'Data Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show',compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit',compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30|min:3|alpha',
            'id_provinsi' => 'required',
          ], [
            'id_provinsi.required' => 'Provinsi harus di pilih ',
            'nama.required' => 'Nama kota harus di isi ',
            'nama.min' => 'Nama kota minimal 3 karakter  ',
            'nama.max' => 'Nama kota tidak boleh lebih dari 30 karakter ',
            'nama.alpha' => 'Nama kota harus huruf bukan angka ',
          ]);
          
        $kota = Kota::findOrFail($id);
        $kota->nama_kota = $request->nama;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
            ->with(['message'=>'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index')
                        ->with(['message1'=>'Data Berhasil Dihapus']);
    }
}
