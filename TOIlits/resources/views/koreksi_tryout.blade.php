@extends('adminlte::page')

@section('title', 'Koreksi Tryout - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
<h1>Koreksi Tryout</h1>
@stop

@section('content')
    <form method="POST" action="/proses_koreksi_tryout" style="max-width:40%">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama">Nama Peserta</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label for="pilihan_tryout">Jenis Tryout</label>
            <select name="pilihan_tryout" required style="width:444px">
                <option hidden disabled selected value>Pilih item</option>
                <option value="1">Saintek</option>
                <option value="2">Soshum</option>
              </select> 
        </div>
        <div class="form-group">
            <label for="paket">Nomor Paket</label>
            <select name="paket" required style="width:444px">
                <option hidden disabled selected value>Pilih item</option>
                <option value="1">Paket 1</option>
                <option value="2">Paket 2</option>
                <option value="3">Paket 3</option>
                <option value="4">Paket 4</option>
                <option value="5">Paket 5</option>
              </select> 
        </div>

        <label >Jawaban Peserta</label>

        <div class="form-group">
            @for ($i = 1; $i <= 200; $i++)
            <div class="form-check">
                <label> Soal No. {{$i}} : </label>
                <label for="soal{{$i}}A">A
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}A" value="1">
                </label>
                &nbsp;
                <label for="soal{{$i}}B">B
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}B" value="2">
                </label>
                &nbsp;
                <label for="soal{{$i}}C">C
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}C" value="3">
                </label>
                &nbsp;
                <label for="soal{{$i}}D">D
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}D" value="4">
                </label>
                &nbsp;
                <label for="soal{{$i}}E">E
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}E" value="5">
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="soal{{$i}}0">Tidak Diisi
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}0" value="">
                </label>
                
                @if ($i % 10 === 0)
                <br><br>
                @endif

            </div>
            @endfor
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop