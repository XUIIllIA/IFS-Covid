@extends('layouts.master')
@section('rw', 'active')
@section('judul', 'RW')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kelurahan</div>

                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kelurahan @error('id_kelurahan')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <select name="id_kelurahan" class="form-control @error('id_kelurahan') is-invalid @enderror"
                                id="id_kelurahan" ">
                            <option value="">Pilih Kelurahan</option>
                            @foreach($kelurahan as $data)
                                <option value=" {{$data->id}}"
                                {{ old('id_kelurahan') == $data->id ? 'selected' : null }}>{{$data->nama_kelurahan}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Rw @error('no_rw')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text" placeholder="Masukan No Rw" class="form-control @error('no_rw') is-invalid @enderror" name="no_rw"
                                value="{{@old('no_rw')}}">
                        </div>
                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/rw') }}"><button type="submit" class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
