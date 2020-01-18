@extends('adminlte::page')

@section('title', 'Lihat Profile - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Lihat Profile</h1>
@stop

@section('content')

<div class="row">
    <div class="col-1">
        <h3>Nama</h3>
        <p>{{$peserta->nama}}</p>
        <h3>Alamat Email</h3>
        <p>{{$email}}</p>
        <h3>Forda</h3>
        <p>{{$forda->nama}}</p>
        <h3>Daerah Forda</h3>
        <p>{{$forda->daerah}}</p>
        <h4>Pilihan Tryout</h4>
        @if($peserta->pilihan_tryout=='1')
            <p>SAINTEK</p>
        @else
            <p>SOSHUM</p>
        @endif
        <h4>Asal Sekolah</h4>
        <p>{{$peserta->asal_sekolah</p>
        <h4>Nomor WA</h4>
        <p>{{$peserta->no_wa}}</p>
        <h4>Status</h4>
        <br>
        <br>
        <br>
        <br>
        <strong>*Apabila ada kekeliruan segera hubungi forda yang bersangkutan</strong>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

@push('css')

@push('js')