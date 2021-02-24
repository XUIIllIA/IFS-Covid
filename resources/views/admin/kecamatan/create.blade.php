@extends('layouts.master')
@section('kecamatan', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kecamatan') }}</div>
                <div class="card-body">
                    <form  action="{{route('kecamatan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kota @error('id_kota')
                                | <i style="color: red"> {{ $message }} </i>
                            @enderror</label>
                            <select name="id_kota" class="form-control @error('id_kota') is-invalid @enderror" id="id_kota">
                                <option value="">Pilih Kota</option>
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Kecamatan @error('nama')
                                    | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text"  class="form-control @error('nama') is-invalid @enderror"  value="{{@old('nama')}}" 
                            name="nama"  placeholder="Masukan Nama Kecamatan">
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
@endsection

@section('js')

<script type="text/javascript">
  $('#id_kota').select2({
    placeholder : "Pilih Kota" ,
  });
</script>


@endsection