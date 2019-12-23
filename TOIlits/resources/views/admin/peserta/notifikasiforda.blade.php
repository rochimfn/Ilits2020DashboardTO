@extends('adminlte::page')

@section('title', 'Notifikasi Forda - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Notifikasi Forda</h1>
@stop

@section('content')
@if(count($notif)<1)
<h5>Tidak ada notifikasi</h5>
@else
@foreach($notif as $n)
<div class="alert alert-success" role="alert">
    <strong>{{ \Carbon\Carbon::parse($n->updated_at)->format('d-m-Y') }}</strong><br>
    {{ $n->pengumuman}}
</div>
@endforeach
@endif
@if($forda->hp_perwakilan!="-")
<p style="position:absolute;bottom:0"><b>Untuk informasi lebih lanjut hubungi <u>{{$forda->nama_perwakilan}}</u> : {{$forda->hp_perwakilan}}@if($forda->id_line_perwakilan!="-") / {{$forda->id_line_perwakilan}}(line)@endif </b></p>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

@push('css')

@push('js')