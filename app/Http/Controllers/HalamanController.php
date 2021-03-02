<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Virus;
use Illuminate\Support\Carbon;

class HalamanController extends Controller
{

    

    public function index()
    {
        // Count Up
        $positif = DB::table('rws')
            ->select('viruses.positif',
            'viruses.sembuh', 'viruses.meninggal')
            ->join('viruses','rws.id','=','viruses.id_rw')
            ->sum('viruses.positif'); 
        $sembuh = DB::table('rws')
            ->select('viruses.positif',
            'viruses.sembuh','viruses.meninggal')
            ->join('viruses','rws.id','=','viruses.id_rw')
            ->sum('viruses.sembuh');
        $meninggal = DB::table('rws')
            ->select('viruses.positif',
            'viruses.sembuh','viruses.meninggal')
            ->join('viruses','rws.id','=','viruses.id_rw')
            ->sum('viruses.meninggal');
        // $posdu = file_get_contents('https://api.kawalcorona.com/positif');
        // $mendu = file_get_contents('https://api.kawalcorona.com/meninggal');
        // $semdu = file_get_contents('https://api.kawalcorona.com/sembuh');
        // $dupos = json_decode($posdu, TRUE);
        // $dumen = json_decode($mendu, TRUE);
        // $dusem = json_decode($semdu, TRUE);

        // Date
        $tanggal = Carbon::now()->format('D d-M-Y');

        // Table Provinsi
        $tampil = DB::table('provinsis')
                  ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                  ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                  ->join('viruses','viruses.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('SUM(viruses.positif) as Positif'),
                          DB::raw('SUM(viruses.sembuh) as Sembuh'),
                          DB::raw('SUM(viruses.meninggal) as Meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();

        // Table Global
        // $datadunia= file_get_contents("https://api.kawalcorona.com/");
        // $dunia = json_decode($datadunia, TRUE);
            
        return view('halaman.index',compact('positif','sembuh','meninggal', 'tanggal','tampil'));
    }
}