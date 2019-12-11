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
                <th>Jurusan Try Out</th>
                <th>Tipe Try Out</th>
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
    @if($e->pilihan_tryout=='1')
        let materi = "Saintek";
    @elseif($e->pilihan_tryout=='2')
        let materi="Soshum";
    @endif

    @if($e->tryout_online=='0')
        let tipe="Offline";
    @elseif($e->tryout_online=='1')
        let tipe="Online";
    @endif
        data.push([
            '{{ $e->nama }}',
            '{{ $e->asal_sekolah }}',
            '{{ $e->no_wa }}',
            materi,
            tipe
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