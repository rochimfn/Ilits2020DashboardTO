@extends('adminlte::page')

@section('title', 'Upload Berkas - ILITS 2020')
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
@if($sudahupload&&$peserta->status!='2')
@if($peserta->status=='0')
<div class="alert alert-warning">
        Berkas anda masih direview oleh forda,mohon menunggu
    </div>
    <div class="row">
            <div class="form-group col-md-4 col-sm-6">
                <label>Kartu Pelajar</label><br>
                <img class="img img-fluid img-thumbnail" src="images/kartupelajar/{{$forda}}/{{ $peserta->kartu_pelajar }}" style="max-width: 200px;"
                    />
                
            </div>
            <div class="form-group col-md-4 col-sm-6">
                    <label>Bukti Pembayaran</label><br>
                    <img class="img img-fluid img-thumbnail" src="images/bukti/{{$forda}}/{{ $peserta->bukti_bayar }}" style="max-width: 200px;"
                        />
            </div>
        </div>
        @elseif($peserta->status=='1')
        <center>
                <h4>Berkas anda telah diterima oleh forda</h4><br>
                <i class="fas fa-check-circle" style="font-size:150px;color:green"></i><br>
                <h4>Silahkan tunggu informasi selanjutnya dari Forda untuk teknis pelaksanaan tryout. <br>Jangan lupa daftar dan pasang aplikasi Zeniora Education untuk mengikuti tryout online.</h4><br>
                <a class="btn" href="https://play.google.com/store/apps/details?id=com.zeniora" target="__blank" style="background:#000;width:auto;color:#fff;padding-right:40px;">
                        <img class="img-fluid" src="http://www.userlogos.org/files/logos/jumpordie/google_play_04.png" style="float:left;height:40px"><small>Available on</small><br><strong>Google Play</strong></a>
                
        </center>
            
        @endif
@else
<div class="alert alert-danger" role="alert" id="alertSize" style="display:none">
    Ukuran file tidak boleh melebihi 200 KB
</div>

@if($peserta->status=='2')
<div class="alert alert-danger">
    Berkas anda ditolak oleh forda anda. Silahkan upload ulang berkas yang dibutuhkan
</div>
@endif
    <p>Silahkan masukkan berkas anda di form berikut (masing-masing gambar tidak boleh melebihi 200KB)</p>

    <form action="/proses_upload_berkas" method="POST" enctype="multipart/form-data" id="formBukti"> 
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
                    <button type="button" onclick="submitForm()" class="btn btn-success">Simpan</button>
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
        var inputPelajar = false;
        var inputBukti = false;
        $(document).ready(function (){
            $('#input-pelajar').change(function () {
                if (this.files && this.files[0]) {
                    if(this.files[0].size>204800){
                        $('#alertSize').show();
                        setTimeout(function(){
                            $('#alertSize').hide();
                        },2000);
                        inputPelajar = false;
                        return;
                    }
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img-kartupelajar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    inputPelajar=true;
                }
            });
            $('#input-bukti').change(function () {
                if (this.files && this.files[0]) {
                    if(this.files[0].size>204800){
                        $('#alertSize').show();
                        setTimeout(function(){
                            $('#alertSize').hide();
                        },2000);
                        inputBukti = false;
                        return;
                    }
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img-bukti').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    inputBukti = true;
                }
            });
        });

        function submitForm(){
            if(inputBukti&&inputPelajar){
                $('#formBukti').submit();
            }else{
                $('#alertSize').show();
                        setTimeout(function(){
                            $('#alertSize').hide();
                        },2000);
            }
        }
    </script>
@stop

@push('css')

@push('js')