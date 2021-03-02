@extends('layouts.master')
@section('kelurahan', 'active')
@section('judul', 'Kelurahan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kelurahan</div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update', $kelurahan->id)}}" method="post">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" id="id_kecamatan" required>
                                @foreach($kecamatan as $data)
                                <option value="{{$data->id}}" {{$data->id == $kelurahan->id_kecamatan ? "selected":""}}>
                                    {{$data->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kelurahan @error('nama')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{@old('nama',$kelurahan->nama_kelurahan)}}">
                        </div>
                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/kelurahan') }}"><button type="submit"
                            class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
