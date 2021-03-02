@extends('layouts.master')
@section('judul', 'Provinsi')
@section('provinsi', 'active')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Provinsi</div>

                <div class="card-body">
                    <form action="{{route('provinsi.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Provinsi @error('nama_provinsi')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text" name="nama_provinsi" class="form-control "
                                value="{{@old('nama_provinsi')}}" placeholder="Masukan Provinsi">
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
