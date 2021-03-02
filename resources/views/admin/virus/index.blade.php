@extends('layouts.master')
@section('virus', 'active')
@section('judul', 'Virus')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
            </div>
            @elseif(session('message1'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message1') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Data Virus
                    <a href="{{ route('virus.create') }}" class="float-right btn btn-success">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-blue">
                                <th scope="col">No</th>
                                <th scope="col">
                                    <center>Lokasi</center>
                                </th>
                                <th scope="col">
                                    <center>RW</center>
                                </th>
                                <th scope="col">
                                    <center>Positif</center>
                                </th>
                                <th scope="col">
                                    <center>Sembuh</center>
                                </th>
                                <th scope="col">
                                    <center>Meninggal</center>
                                </th>
                                <th scope="col">
                                    <center>Waktu</center>
                                </th>
                                <th scope="col">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($virus as $data)
                            <tr>
                                <th scope="row">
                                    <center>{{ $no++ }}</center>
                                </th>
                                <td>
                                    <center>
                                        Provinsi :
                                        {{ $data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                                        Kota : {{ $data->rw->kelurahan->kecamatan->kota->nama_kota }}<br>
                                        Kecamatan : {{ $data->rw->kelurahan->kecamatan->nama_kecamatan }}<br>
                                        Kelurahan : {{ $data->rw->kelurahan->nama_kelurahan }}<br>
                                    </center>
                                </td>
                                <td>
                                    <center>{{ $data->rw->no_rw }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->positif }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->sembuh }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->meninggal }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->created_at }}</center>
                                </td>
                                <td>
                                    <form action="{{ route('virus.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <center>
                                            <a href="{{ route('virus.edit', $data->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></a></i>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
