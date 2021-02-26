@extends('layouts.master')
@section('kelurahan', 'active')
@section('judul', 'Kelurahan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kelurahan') }}</div>
                <div class="card-body">
                    <form  action="{{route('kelurahan.update', $kelurahan->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" id="id_kecamatan" required>
                                @foreach($kecamatan as $data)
                                <option value="{{$data->id}}"
                                    {{$data->id == $kelurahan->id_kecamatan ? "selected":""}}>{{$data->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kelurahan @error('nama')
                                | <i style="color: red"> {{ $message }} </i>
                            @enderror</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1" name="nama"
                            value="{{@old('nama',$kelurahan->nama_kelurahan)}}" autofocus>
                        </div>
                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/kelurahan') }}"><button type="submit" class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
  $('#id_kecamatan').select2({
    placeholder : "Pilih Kota" ,
  });
</script>


@endsection
