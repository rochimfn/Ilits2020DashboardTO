@extends('adminlte::page')

@section('title', 'Daftar Peserta Tryout Online - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
<h1 style="float:left">Daftar Peserta Tryout Online</h1><br>
@stop

@section('content')
@if($message=Session::get('pesan'))
<div class="alert alert-{{ Session::get('tipe') }}" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-bordered" id="event-table">
    <thead>
    <tr>
        <th>Forda</th>
        <th>Nama</th>
        <th>Alamat Email</th>
        <th>Token</th>
        <th>Paket</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<h3>Total Peserta Tryout Online : {{count($peserta)}}</h3>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
<script>
    var data=[];
    @foreach($peserta as $e)

    data.push([
        '{{ $e->namaforda }}',
        '{{ $e->nama }}',
        '{{ $e->email }}',
        '{{ $e->token }}',
        '{{ $e->paket }}'
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
