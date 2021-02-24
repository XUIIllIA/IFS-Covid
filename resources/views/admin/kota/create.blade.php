@extends('layouts.master')
@section('kota', 'active')
@section('css')


@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Kota</div>
                    <div class="card-body">
                        <form action="{{ route('kota.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Provinsi @error('id_provinsi')
                                        | <i style="color: red"> {{ $message }} </i>
                                    @enderror</label>
                                <select name="id_provinsi" class="form-control" id="id_provinsi">
                                    <option></option>
                                    @foreach ($provinsi as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('id_provinsi') == $data->id ? 'selected' : null }}>
                                            {{ $data->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                                @error('id_provinsi')
                                    <div class="invalid-feedback">
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Kota @error('nama') | <i style="color: red"> {{ $message }}
                                    </i>@enderror</label>
                                <input type="text" class="form-control" value="{{ @old('nama') }}" name="nama"
                                    placeholder="Masukan Nama Kota">
                            </div>
                            <div class="form-group">
                                <br><button type="submit" class="btn-block btn-info">Kirim</button>
                            </div>
                        </form>
                        <a href="{{ url('admin/kota') }}"><button type="submit"
                                class="btn-block btn-dark">kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">
        $('#id_provinsi').select2({
            placeholder: "Pilih Provinsi",
        });

    </script>


@endsection
