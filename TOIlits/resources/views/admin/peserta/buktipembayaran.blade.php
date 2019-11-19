@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Upload Berkas</h1>
@stop

@section('content')

@if($message=Session::get('pesan'))
<div class="alert alert-{{Session::get('tipe')}}">
    {{ $message }}
</div>
@endif
@if($sudahupload)
<div class="alert alert-warning">
        Berkas anda masih direview oleh forda,mohon menunggu
    </div>
    <div class="row">
            <div class="form-group col-md-4 col-sm-6">
                <label>Kartu Pelajar</label><br>
                <img class="img img-fluid img-thumbnail" src="images/kartupelajar/{{ $peserta->kartu_pelajar }}" style="max-width: 200px;"
                    />
                
            </div>
            <div class="form-group col-md-4 col-sm-6">
                    <label>Bukti Pembayaran</label><br>
                    <img class="img img-fluid img-thumbnail" src="images/bukti/{{ $peserta->bukti_bayar }}" style="max-width: 200px;"
                        />
            </div>
        </div>
    
@else
    <p>Silahkan masukkan berkas anda di form berikut (masing-masing gambar tidak boleh melebihi 200KB)</p>

    <form action="/proses_upload_berkas" method="POST" enctype="multipart/form-data"> 
        {{csrf_field()}}
        <div class="row">
                <div class="form-group col-md-4 col-sm-6">
                    <label>Kartu Pelajar</label><br>
                    <img class="img img-fluid img-thumbnail" src="images/placeholder.jpg" style="max-width: 200px;"
                        id="img-kartupelajar" />
                    <br>&nbsp;
                    <input type="file" class="form-control-file" name="input-pelajar" id="input-pelajar" placeholder=""
                        accept="image/*" required>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Bukti Pembayaran</label><br>
                    <img class="img img-fluid img-thumbnail" src="images/placeholder.jpg" style="max-width: 200px;"
                        id="img-bukti" />
                    <br>&nbsp;
                    <input type="file" class="form-control-file" name="input-bukti" id="input-bukti" placeholder=""
                        accept="image/*" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
    </form>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
        $(document).ready(function (){
            $('#input-pelajar').change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img-kartupelajar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            $('#input-bukti').change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img-bukti').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@stop

@push('css')

@push('js')