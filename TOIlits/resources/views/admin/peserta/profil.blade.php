@extends('adminlte::page')

@section('title', 'Lihat Profile - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Lihat Profile</h1>
@stop

@section('content')

<div class="row">
    <div class="container">
        <div class="col-12 col-md-6">
            <h3>Nama</h3>
            <p>{{$peserta->nama}}</p>
            <h3>Alamat Email</h3>
            <p>{{$email}}</p>
            <h3>Forda</h3>
            <p>{{$forda->nama}}</p>
        </div>
        <div class="col-12 col-md-6">
            <h3>Daerah Forda</h3>
            <p>{{$forda->daerah}}</p>
            <h4>Pilihan Tryout</h4>
            <p>{{$peserta->pilihan_tryout=='1'?'SAINTEK':'SOSHUM'}}</p>
            <h4>Asal Sekolah</h4>
            <p>{{$peserta->asal_sekolah}}</p>
            <h4>Nomor WA</h4>
            <p>{{$peserta->no_wa}}</p>
            <h4>Status</h4>
            <p>{{$peserta->status==1?'Aktif':'Belum Aktif'}}</p>
        </div>
        <strong>*Apabila ada kekeliruan segera hubungi forda yang bersangkutan</strong>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('css')
