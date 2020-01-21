@extends('adminlte::page')

@section('title', 'Statistik Pendaftar - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Statistik Pendaftar</h1>&nbsp;<a href="/dashboard/exportExcelPeserta"><button type="button" class="btn btn-primary">Export Excel</button></a>
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
            <th>Forda</th>
            <th>Asal</th>
            <th>Peserta</th>
            <th>Terkonfirmasi</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Indonesia</td>
                <td>Indonesia</td>
                <td>{{$pesertaseindonesia[0]->total}}</td>
                <td>{{$pesertaseindonesia[0]->terkonfirmasi}}</td>
            </tr>
            @foreach($peserta as $perforda)
            <tr>
                <td>{{$perforda->nama}}</td>
                <td>{{$perforda->asal}}</td>
                <td>{{$perforda->total}}</td>
                <td>{{$perforda->pesertaterkonfirmasi}}</td>
            </tr>
            @endforeach
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
