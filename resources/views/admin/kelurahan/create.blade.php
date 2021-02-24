@extends('layouts.master')
@section('kelurahan', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kelurahan') }}</div>
                <div class="card-body">
                    <form  action="{{route('kelurahan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kecamatan @error('id_kecamatan')
                                | <i style="color: red"> {{ $message }} </i>
                            @enderror</label>
                            <select class="form-control @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan">
                                <option value=""></option>
                                @foreach($kecamatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="mb-12">
                                <label for="">Kelurahan @error('nama')
                                    | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{@old('nama')}}" 
                                placeholder="Masukan Nama Kelurahan" name="nama">
                            </div>
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
  $('#id_kecamatan').select2({
    placeholder : "Pilih Kota" ,
  });
</script>


@endsection