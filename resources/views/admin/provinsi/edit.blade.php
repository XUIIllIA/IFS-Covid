@extends('layouts.master')
@section('judul', 'Provinsi')
@section('provinsi', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Provinsi</div>

                <div class="card-body">
                    <form action="{{route('provinsi.update', $provinsi->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Provinsi @error('nama_provinsi') |
                                <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror"
                                value="{{@old('nama_provinsi',$provinsi->nama_provinsi)}}" name="nama_provinsi">
                            @error('nama_provinsi')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/provinsi') }}"><button type="submit"
                            class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
