@extends('layouts.master')
@section('judul', 'RW')
@section('rw', 'active')
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
                <div class="card-header">Data Rw
                    <a href="{{ route('rw.create') }}" class="float-right btn btn-success">Tambah Data</a>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-blue">
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Kelurahan</center>
                                </th>
                                <th scope="col">
                                    <center>Nama Rw</center>
                                </th>
                                <th scope="col">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no= 1; @endphp
                            @foreach ($rw as $data)
                            <tr>
                                <th scoppe="row">
                                    <center>{{ $no++ }}</center>
                                </th>
                                <td>
                                    <center>{{ $data->kelurahan->nama_kelurahan }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->no_rw }}</center>
                                </td>
                                <td>
                                    <form action="{{ route('rw.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <center>
                                            <a href="{{ route('rw.edit', $data->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></a></i>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

