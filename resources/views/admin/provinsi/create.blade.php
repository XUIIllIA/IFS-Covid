@extends('layouts.master')
@section('provinsi', 'active')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}</div>

                <div class="card-body">
                <form  action="{{route('provinsi.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Provinsi @error('nama')
                        | <i style="color: red"> {{ $message }} </i>
                        @enderror</label>
                        <input type="text" name="nama" class="form-control " value="{{@old('nama')}}" 
                        placeholder="Masukan Nama Provinsi" autofocus>
                        @error('nama')
                        <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-block btn-info">Kirim</button>
                   
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection