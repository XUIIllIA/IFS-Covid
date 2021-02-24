@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data kasus
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kasus.update', $kasus->id) }}" method="post">
                            @csrf @method('put')
                            @livewire('dropdowns',['selectedRw'=>$kasus->id_rw,'selectedKelurahan'=>$kasus->rw->id_kelurahan,
                            'selectedKecamatan'=>$kasus->rw->kelurahan->id_kecamatan,
                            'selectedKota'=>$kasus->rw->kelurahan->kecamatan->id_kota,
                            'selectedProvinsi'=>$kasus->rw->kelurahan->kecamatan->kota->id_provinsi])
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">positif</label>
                                    <input type="text" name="positif" class="form-control" value="{{ $kasus->positif }}"
                                        required>
                                </div>
                                <div class="form-group  col-4">
                                    <label for="">sembuh</label>
                                    <input type="text" name="sembuh" class="form-control" value="{{ $kasus->sembuh }}"
                                        required>
                                </div>
                                <div class="form-group  col-4">
                                    <label for="">meninggal</label>
                                    <input type="text" name="meninggal" class="form-control"
                                        value="{{ $kasus->meninggal }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection