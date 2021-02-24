@extends('layouts.master')
@section('rw', 'active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kelurahan') }}</div>

                <div class="card-body">
                <form  action="{{route('rw.store')}}" method="post">
                    @csrf
                     <div class="form-group">
                        <label for="">Kelurahan @error('id_kelurahan')
                            | <i style="color: red"> {{ $message }} </i>
                        @enderror</label>
                        <select name="id_kelurahan"  class="form-control @error('id_kelurahan') is-invalid @enderror" id="id_kelurahan">
                            <option value=""></option>
                            @foreach($kelurahan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="">Rw @error('nama')
                            | <i style="color: red"> {{ $message }} </i>
                        @enderror</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
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