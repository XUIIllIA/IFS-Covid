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
use App\Http\Models\Kasus;
use Illuminate\Support\Carbon;

class HalamanController extends Controller
{

    

    public function index()
    {
        // Count Up
        $positif = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh', 'kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.positif'); 
        $sembuh = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.meninggal');
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
                  ->join('kasuses','kasuses.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('SUM(kasuses.positif) as Positif'),
                          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
                          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();

        // Table Global
        // $datadunia= file_get_contents("https://api.kawalcorona.com/");
        // $dunia = json_decode($datadunia, TRUE);
            
        return view('halaman.index',compact('positif','sembuh','meninggal', 'tanggal','tampil'));
    }
}