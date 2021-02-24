@extends('layouts.master')
@section('kecamatan', 'active')
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
          <div class="card-header">{{ __('Data Kecamatan') }}
          <a href="{{route('kecamatan.create')}}" class="float-right btn btn-info">Add Data</a>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr class="bg-blue">
              <th scope="col"><center>No</center></th>
              <th scope="col"><center>Kota</center></th>
              <th scope="col"><center>Nama Kecamatan</center></th>
              <th scope="col"><center>Action</center></th>
              </tr>  
          </thead>
          <tbody>
            @php $no= 1; @endphp
            @foreach($kecamatan as $data)
              <tr>
                <th scoppe="row"><center>{{$no++}}</center></th>
                <td><center>{{$data->kota->nama_kota}}</center></td>
                <td><center>{{$data->nama_kecamatan}}</center></td>
                <td>
                  <form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <center>
                    <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a></i>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
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
@endsection

@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection