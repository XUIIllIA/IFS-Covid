<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Kasus2;
use Illuminate\Support\Carbon;

class FrontendController extends Controller {



    public function index() {
        // Count Up
        $positif=DB: :table('rws') ->select('trackings.positif',
                'trackings.sembuh', 'trackings.meninggal') ->join('trackings', 'rws.id', '=', 'trackings.id_rw') ->sum('trackings.positif');
        $sembuh=DB: :table('rws') ->select('trackings.positif',
                'trackings.sembuh', 'trackings.meninggal') ->join('trackings', 'rws.id', '=', 'trackings.id_rw') ->sum('trackings.sembuh');
        $meninggal=DB: :table('rws') ->select('trackings.positif',
                'trackings.sembuh', 'trackings.meninggal') ->join('trackings', 'rws.id', '=', 'trackings.id_rw') ->sum('trackings.meninggal');
        $global=file_get_contents('https://api.kawalcorona.com/positif');
        $posglobal=json_decode($global, TRUE);

        // Date
        $tanggal=Carbon: :now()->format('D d-M-Y');

        // Table Provinsi
        $tampil=DB: :table('provinsis') ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id') ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id') ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id') ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id') ->join('trackings', 'trackings.id_rw', '=', 'rws.id') ->select('nama_provinsi',
                DB::raw('sum(trackings.positif) as positif'),
                DB::raw('sum(trackings.sembuh) as sembuh'),
                DB::raw('sum(trackings.meninggal) as meninggal')) ->groupBy('nama_provinsi')->orderBy('nama_provinsi', 'ASC') ->get();

        // Table Global
        $datadunia=file_get_contents("https://api.kawalcorona.com/");
        $dunia=json_decode($datadunia, TRUE);

        return view('frontend.welcome', compact('positif', 'sembuh', 'meninggal', 'posglobal', 'tanggal', 'tampil', 'dunia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
