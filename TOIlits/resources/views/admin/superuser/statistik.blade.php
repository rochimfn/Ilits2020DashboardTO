@extends('adminlte::page')

@section('title', 'Statistik Pendaftar - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Statistik Pendaftar</h1>
@stop

@section('content')
        @if($message=Session::get('pesan'))
        <div class="alert alert-{{ Session::get('tipe') }}" role="alert">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Status</th>
            <th>Jumlah Peserta</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Peserta Keseluruhan</td>
                <td>{{ $totalpeserta }}</td>
            </tr>
            <tr>
                <td>Peserta Terkonfirmasi</td>
                <td>{{ $totalpesertaterkonfirmasi }}</td>
            </tr>
            <tr>
                <td>Peserta Online</td>
                <td>{{ $totalpesertaonline }}</td>
            </tr>
            <tr>
                <td>Peserta Online Terkonfirmasi</td>
                <td>{{ $totalpesertaonlineterkonfirmasi }}</td>
            </tr>
            <tr>
                <td>Peserta Offline</td>
                <td>{{ $totalpesertaoffline }}</td>
            </tr>
            <tr>
                <td>Peserta Offline Terkonfirmasi</td>
                <td>{{ $totalpesertaofflineterkonfirmasi }}</td>
            </tr>
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
@stop

@push('css')

    @push('js')
