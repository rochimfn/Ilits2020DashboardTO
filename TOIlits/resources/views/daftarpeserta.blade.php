@extends('adminlte::page')

@section('title', 'Daftar Peserta - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Daftar Peserta</h1>&nbsp;<a href="/cetak_absen"><button type="button" class="btn btn-primary" style="float:left;margin-left:8px">Cetak Absen</button></a>
@stop

@section('content')

    <table class="table table-bordered" id="event-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>No Telepon</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
    <h3>Jumlah Peserta : {{count($peserta)}}</h3>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
<script src="datepicker/js/bootstrap-datepicker.js"></script>
<script>
    var data=[];
    @foreach($peserta as $e)
        data.push([
            '{{ $e->nama }}',
            '{{ $e->asal_sekolah }}',
            '{{ $e->no_wa }}'
    ]);
    @endforeach
    $(document).ready( function () {
        $('#event-table').DataTable({
            data:data
        });
        
    } );

</script>
@stop

@push('css')

@push('js')