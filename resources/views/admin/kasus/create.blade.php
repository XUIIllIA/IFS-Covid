@extends('layouts.master')
@section('judul', 'Kasus')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data kasus
                </div>
                <div class="card-body">
                    <form action="{{ route('virus.store') }}" method="post">
                        @csrf
                        @livewire('dropdowns')
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">positif</label>
                                <input type="text" name="positif" class="form-control" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="">sembuh</label>
                                <input type="text" name="sembuh" class="form-control" required>
                            </div>
                            <div class="form-group  col-4">
                                <label for="">meninggal</label>
                                <input type="text" name="meninggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <br><button type="submit" class="btn-block btn-info">simpan</button>
                        </div>
                    </form>
                    <a href="{{ url('/kasus') }}"><button type="submit" class="btn-block btn-dark">kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
