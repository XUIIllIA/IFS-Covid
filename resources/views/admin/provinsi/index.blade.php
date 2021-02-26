@extends('layouts.master')
@section('judul', 'Provinsi')
@section('provinsi', 'active')
@section('css')

@endsection
@section('content')

    <div class="container">
        <div class="row">
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
                    <div class="card-header">{{ __('Data Provinsi') }}
                        <a href="{{ route('provinsi.create') }}" class="float-right btn btn-success">Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-blue">
                                    <th scope="col">
                                        <center>No</center>
                                    </th>
                                    <th scope="col">
                                        <center>Nama Provinsi</center>
                                    </th>
                                    <th scope="col">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no= 1; @endphp
                                @foreach ($provinsi as $data)
                                    <tr>
                                        <th scoppe="row">
                                            <center>{{ $no++ }}</center>
                                        </th>
                                        <td>
                                            <center>{{ $data->nama_provinsi }}</center>
                                        </td>
                                        <td>
                                            <form action="{{ route('provinsi.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <center>
                                                    <a href="{{ route('provinsi.edit', $data->id) }}"
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

@section('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
        });

    </script>
@endsection
