@extends('layouts.master')
@section('provinsi', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}</div>

                <div class="card-body">
                    <form  action="{{route('provinsi.update', $provinsi->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                    <div class="form-group">
                            <label for="">Provinsi @error('nama') |
                                <i style="color: red"> {{ $message }} </i>
                            @enderror</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{@old('nama',$provinsi->nama_provinsi)}}" name="nama">
                            @error('nama')
                            <div class="invalid-feedback"></div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-block btn-info">Submit</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
