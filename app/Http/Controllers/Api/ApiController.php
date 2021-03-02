<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Virus;
use DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function provinsi()
    {
        $provinsi = DB::table('provinsis')
            ->select('provinsis.nama_provinsi','provinsis.kode_provinsi',
            DB::raw('SUM(viruses.positif) as Positif'),
            DB::raw('SUM(viruses.sembuh) as Sembuh'),
            DB::raw('SUM(viruses.meninggal) as Meninggal'))
                ->join('kotas','provinsis.id','=','kotas.id_provinsi')
                ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
                ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
                ->join('rws','kelurahans.id','=','rws.id_kelurahan')
                ->join('viruses','rws.id','=','viruses.id_rw')
            ->groupBy('provinsis.id')->get();

        $positif = DB::table('provinsis')
            ->join('kotas','kotas.id_provinsi','=','provinsis.id')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('viruses','viruses.id_rw','=','rws.id')
            ->select('viruses.positif')
            ->sum('viruses.positif');

        $sembuh = DB::table('provinsis')
            ->join('kotas','kotas.id_provinsi','=','provinsis.id')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('viruses','viruses.id_rw','=','rws.id')
            ->select('viruses.positif',
                'viruses.sembuh','viruses.meninggal')
            ->sum('viruses.sembuh');

        $meninggal = DB::table('provinsis')
            ->join('kotas','kotas.id_provinsi','=','provinsis.id')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('viruses','viruses.id_rw','=','rws.id')
            ->select('viruses.positif',
                'viruses.sembuh','viruses.meninggal')
            ->sum('viruses.meninggal');
       
            return response([
                'success' => true,
                'data' => ['Hari Ini' => $provinsi,
                          ],
                'Total' => ['Jumlah Positif'   => $positif,
                            'Jumlah Sembuh'    => $sembuh,
                            'Jumlah Meninggal' => $meninggal,
                          ],
                'message' => 'Berhasil'
            ], 200);
    }

    public function Rw()
    {
        $rw = DB::table('viruses')
                ->select([
                    DB::raw('SUM(positif) as Positif'),
                    DB::raw('SUM(sembuh) as Sembuh'),
                    DB::raw('SUM(meninggal) as Meninggal'),
                ])
                ->groupBy('tanggal')->get();

        $positif = DB::table('rws')
                ->select('viruses.positif',
                'viruses.sembuh','viruses.meninggal')
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

             return response([
                'success' => true,
                'data' => ['Hari Ini' => $rw,
                          ],
                'Total' => ['Jumlah Positif'   => $positif,
                            'Jumlah Sembuh'    => $sembuh,
                            'Jumlah Meninggal' => $meninggal,
                          ],
                'message' => 'Berhasil'
            ], 200);
    }
    
    public function kota()
    {
        $kota = DB::table('kotas')
        ->select('provinsis.nama_provinsi','kotas.kode_kota','kotas.nama_kota',
            DB::raw('SUM(viruses.positif) as Positif'),
            DB::raw('SUM(viruses.sembuh) as Sembuh'),
            DB::raw('SUM(viruses.meninggal) as Meninggal'))
                ->join('provinsis','provinsis.id','=','kotas.id_provinsi')
                ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
                ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
                ->join('rws','kelurahans.id','=','rws.id_kelurahan')
                ->join('viruses','rws.id','=','viruses.id_rw')
            ->groupBy('kotas.id')->get();

        return response([
            'success' => true,
            'data' => $kota,
            'message' => 'Berhasil'
        ], 200);
    }

    public function kecamatan()
    {
        $kecamatan = DB::table('kecamatans')
        ->select('kotas.nama_kota','kecamatans.kode_kecamatan','kecamatans.nama_kecamatan',
            DB::raw('SUM(viruses.positif) as Positif'),
            DB::raw('SUM(viruses.sembuh) as Sembuh'),
            DB::raw('SUM(viruses.meninggal) as Meninggal'))
                ->join('kotas','kotas.id','=','kecamatans.id_kota')
                ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
                ->join('rws','kelurahans.id','=','rws.id_kelurahan')
                ->join('viruses','rws.id','=','viruses.id_rw')
        ->groupBy('kotas.id')->get();

        return response([
            'success' => true,
            'data' => $kecamatan,
            'message' => 'Berhasil'
        ], 200);
    }

    public function kelurahan()
    {
        $kelurahan = DB::table('kelurahans')
        ->select('kecamatans.nama_kecamatan','kelurahans.nama_kelurahan',
            DB::raw('SUM(viruses.positif) as Positif'),
            DB::raw('SUM(viruses.sembuh) as Sembuh'),
            DB::raw('SUM(viruses.meninggal) as Meninggal'))
                ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
                ->join('rws','kelurahans.id','=','rws.id_kelurahan')
                ->join('viruses','rws.id','=','viruses.id_rw')
        ->groupBy('kelurahans.id')->get();

        return response([
            'success' => true,
            'data'    => $kelurahan,
            'message' => 'Berhasil'
        ], 200);
    }

    public function all()
    {
        $positif = DB::table('rws')
              ->select('viruses.sembuh',
              'viruses.positif','viruses.meninggal')
              ->join('viruses','rws.id','=','viruses.id_rw')
              ->sum('viruses.positif');
        $sembuh = DB::table('rws')
              ->select('viruses.sembuh',
              'viruses.positif','viruses.meninggal')
              ->join('viruses','rws.id','=','viruses.id_rw')
              ->sum('viruses.sembuh');
        $meninggal = DB::table('rws')
              ->select('viruses.sembuh',
              'viruses.positif','viruses.meninggal')
              ->join('viruses','rws.id','=','viruses.id_rw')
              ->sum('viruses.meninggal');

            return response([
                'success' => true,
                'data' => 'Data Indonesia',
                          'Jumlah Positif'   => $positif,
                          'Jumlah Sembuh'    => $sembuh,
                          'Jumlah Meninggal' => $meninggal,        
                'message' => 'Berhasil'
            ], 200);
    }

    public function positif()
    {
        $positif = DB::table('rws')
            ->select('viruses.sembuh',
            'viruses.positif','viruses.meninggal')
            ->join('viruses','rws.id','=','viruses.id_rw')
            ->sum('viruses.positif');

        return response([
            'success' => true,
            'data' => 'Data Positif',
                      'Jumlah Positif' => $positif,       
            'message' => 'Berhasil'
        ], 200);
    }

    public function sembuh()
    {
        $sembuh = DB::table('rws')
              ->select('viruses.sembuh',
              'viruses.positif','viruses.meninggal')
              ->join('viruses','rws.id','=','viruses.id_rw')
              ->sum('viruses.sembuh');

        return response([
            'success' => true,
            'data' => 'Data Sembuh',
                      'Jumlah Sembuh' => $sembuh,       
            'message' => 'Berhasil'
        ], 200);
    }

    public function meninggal()
    {
        $meninggal = DB::table('rws')
        ->select('viruses.sembuh',
        'viruses.positif','viruses.meninggal')
        ->join('viruses','rws.id','=','viruses.id_rw')
        ->sum('viruses.meninggal');

        return response([
            'success' => true,
            'data' => 'Data Meninggal',
                      'Jumlah Meninggal' => $meninggal,       
            'message' => 'Berhasil'
        ], 200);
    }

    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
            $raw = $val ['attributes' ];
            $res = ['Negara' => $raw['Country_Region'],
                    'Positif' => $raw['Confirmed'],
                    'Sembuh' => $raw['Recovered'],
                    'Meninggal' => $raw['Deaths']
            ];

            array_push ($this->data, $res);
        }
            $data = [
                'success' => true,
                'Data Global' => $this->data,
                'message' => 'Berhasil'
            ];

            return response()->json($data, 200);
    }

}
