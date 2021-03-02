@extends('layouts.master')
@section('kota', 'active')
@section('judul', 'Kota')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kota</div>
                <div class="card-body">
                    <form action="{{route('kota.update', $kota->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="id_provinsi" class="form-control" id="id_provinsi" required>
                                @foreach($provinsi as $data)
                                <option value="{{$data->id}}" {{$data->id == $kota->id_provinsi ? "selected":""}}
                                    {{ old('id_provinsi') == $data->id ? 'selected' : null }}> {{$data->nama_provinsi}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kota @error('nama')
                                | <i style="color: red"> {{ $message }} </i>
                                @enderror</label>
                            <input type="text" class="form-control" name="nama"
                                value="{{@old('nama',$kota->nama_kota)}}">
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

{{-- @section('js')

<script type="text/javascript">
    $('#id_provinsi').select2({
        placeholder: "Pilih Provinsi",
    });

</script>


@endsection --}}
