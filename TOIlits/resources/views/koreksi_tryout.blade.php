@extends('adminlte::page')

@section('title', 'Koreksi Tryout - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
<h1>Koreksi Tryout</h1>
@stop

@section('content')
    <form method="POST" action="/proses_koreksi_tryout" style="max-width:40%">
        {{ csrf_field() }}
        <input type="hidden" name="forda_id" value="{{ Session::get('id')}}">
        <div class="form-group row">
            <label for="peserta" class="col-md-3">Nama Peserta</label>
            <input type="text" class="col-md-9" name="peserta" required>
        </div>
        <div class="form-group row">
            <label for="pilihan_tryout" class="col-md-3">Jenis Tryout</label>
            <select name="pilihan_tryout" class="col-md-9" required style="width:444px">
                <option hidden disabled selected value>Pilih item</option>
                <option value="1">Saintek</option>
                <option value="2">Soshum</option>
              </select> 
        </div>
        <div class="form-group row">
            <label for="paket" class="col-md-3">Nomor Paket</label>
            <select name="paket" class="col-md-9" required style="width:444px">
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
                    <input type="radio" name="soal{{$i}}" id="soal{{$i}}0" value="" checked>
                </label>
                
                @if ($i % 10 === 0)
                <br><br>
                @endif

            </div>
            @endfor
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="modalSimpan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="#modalTitle">Konfirmasi</h5>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menyimpan jawaban peserta?<br>
                        <b>Jawaban yang telah disimpan tidak dapat diubah</b>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalSimpan">Simpan</button>
    </form>
@stop

@section('css')
    
@stop