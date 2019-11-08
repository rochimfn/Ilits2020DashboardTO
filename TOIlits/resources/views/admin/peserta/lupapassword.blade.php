@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Lupa Password</h1>
@stop

@section('content')
    <p>Coba tes.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@push('css')

@push('js')