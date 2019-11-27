@extends('adminlte::page')

@section('title', 'Notifikasi Forda - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Notifikasi Forda</h1>
@stop

@section('content')
    @foreach($notif as $n)
        <div class="alert alert-success" role="alert">
            {{ $n->pengumuman}}
        </div>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@push('css')

@push('js')