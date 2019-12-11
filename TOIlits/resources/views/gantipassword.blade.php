@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Ganti Password</h1>
@stop

@section('content')
    @if($message=Session::get('pesan'))
        <div class="alert alert-{{ Session::get('tipe') }}" role="alert">
            {{$message}}
        </div>

    @endif
    <form action="/proses_ganti_password" method="POST" style="max-width:50%">
        {{csrf_field()}}
        <div class="form-group">
          <label>Password Lama</label>
          <input type="password" class="form-control" name="passwordlama" required>
        </div>
        <div class="form-group">
          <label>Password Baru</label>
          <input type="password" class="form-control" name="passwordbaru" required pattern=".{6,12}">
          <small class="form-text text-muted">Password terdiri dari 6-12 karakter.</small>
        </div>
        <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@push('css')

@push('js')