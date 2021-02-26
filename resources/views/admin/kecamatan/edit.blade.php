@extends('layouts.master')
@section('kecamatan', 'active')
@section('judul', 'Kecamatan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kecamatan') }}</div>
                <div class="card-body">
                    <form  action="{{route('kecamatan.update', $kecamatan->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Kota</label>
                                <select name="id_kota" class="form-control" required id="id_kota">
                                    @foreach($kota as $data)
                                    <option value="{{$data->id}}"{{$data->id == $kecamatan->id_kota ? "selected":""}}>{{$data->nama_kota}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <div class="mb-12">
                                <label for="">Kecamatan @error('nama')
                                    | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1" name="nama"
                                value="{{@old('nama',$kecamatan->nama_kecamatan)}}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/kecamatan') }}"><button type="submit" class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script type="text/javascript">
  $('#id_kota').select2({
    placeholder : "Pilih Provinsi" ,
  });
</script>


@endsection
