@extends('layouts.master')
@section('kecamatan', 'active')
@section('judul', 'Kecamatan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kecamatan</div>
                <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kota @error('id_kota')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <select name="id_kota" class="form-control @error('id_kota') is-invalid @enderror"
                                id="id_kota">
                                <option value="">Pilih Kota</option>
                                @foreach($kota as $data)
                                <option value="{{$data->id}}" {{ old('id_kota') == $data->id ? 'selected' : null }}>{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan @error('nama_kecamatan')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text"  placeholder="Masukan Kecamtan" class="form-control @error('nama_kecamatan') is-invalid @enderror" value="{{@old('nama_kecamatan')}}" name="nama_kecamatan">
                        </div>
                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/kecamatan') }}"><button type="submit"
                            class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection