<?php

namespace App\Http\Controllers;

use App\Models\Virus;
use App\Models\Rw;
use Illuminate\Http\Request;

class VirusController extends Controller
{
    public function index()
    {
        $virus = Virus::with('rw.kelurahan.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($virus);
        return view('admin.virus.index',compact('virus'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.virus.create',compact('rw'));
    }

    public function store(Request $request)
    {
        $virus = new Virus();
        $virus->id_rw = $request->id_rw;
        $virus->positif = $request->positif;
        $virus->sembuh = $request->sembuh;
        $virus->meninggal = $request->meninggal;
        $virus->save();
        return redirect()->route('virus')
        ->with(['message'=>'Data Berhasil Dibuat']);
    }

    public function show($id)
    {
        $virus = Virus::findOrFail($id);
        return view('admin.virus.show',compact('virus'));
    }


    public function edit($id)
    {
        $rw = Rw::all();
        $virus = Virus::findOrFail($id);
        return view('admin.virus.edit',compact('virus','rw'));
    }


    public function update(Request $request, $id)
    {
        $virus = Virus::findOrFail($id);
        $virus->id_rw = $request->id_rw;
        $virus->positif = $request->positif;
        $virus->sembuh = $request->sembuh;
        $virus->meninggal = $request->meninggal;
        $virus->save();
        return redirect()->route('virus')
        ->with(['message'=>'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        $virus = Virus::findOrFail($id);
        $virus->delete();
        return redirect()->route('virus')
        ->with(['message1'=>'Data Berhasil Dihapus']);
    }
}
