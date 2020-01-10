@extends('adminlte::page')

@section('title', 'Cetak Absen - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Cetak Absen</h1>
@stop

@section('content')
<br>
    <h5>Absen sedang dibuat. Lama proses tergantung seberapa banyak peserta dan kesibukan server.</h5>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
<script>
    
    $(document).ready( function () {
        setTimeout(function(){
            window.location.href="{{ URL::to('/proses_cetak_absen') }}";
        },1000);
        
    } );

</script>
@stop

@push('css')

@push('js')