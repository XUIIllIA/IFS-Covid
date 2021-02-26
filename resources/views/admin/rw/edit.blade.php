@extends('layouts.master')
@section('judul', 'RW')
@section('rw', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Rw') }}</div>

                <div class="card-body">
                    <form  action="{{route('rw.update', $rw->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf

                <div class="form-group">
                    <label for="">Kelurahan</label>
                        <select name="id_kelurahan" class="form-control" id="id_kelurahan" required>
                            @foreach($kelurahan as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $rw->id_kelurahan ? "selected":""}}>{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <div class="mb-12">
                        <label for="">Rw @error('nama')
                            | <i style="color: red"> {{ $message }} </i>
                        @enderror</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1" name="nama"
                        value="{{@old('nama',$rw->nama_rw)}}">
                    </div>
                </div>

                <div class="form-group">
                    <br><button type="submit" class="btn-block btn-info">simpan</button>
                </div>
            </form>
            <a href="{{ url('/kota') }}"><button type="submit" class="btn-block btn-dark">kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
  $('#id_kelurahan').select2({
    placeholder : "Pilih Kelurahan" ,
  });
</script>


@endsection
