@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Konfirmasi Berkas</h1>
@stop

@section('content')
<div class="card">
</div class="card-body">
    <table class="table table-bordered">
        <tr><th>Nama</th>
        <th>Asal Sekolah</th>
        <th>Aksi</th>
        </tr>
        <?php $x=1; ?>
        @foreach($peserta as $data)
            <tr>
                <td>{{$data->nama}}</td>
                <td>{{$data->asal_sekolah}}</td>
                <td><button class="btn btn-primary" onclick="showDetail('<?=$x;?>')">Lihat Berkas</button> <button class="btn btn-success">Terima</button> <button class="btn btn-danger">Tolak</button></td>
            </tr>
            <tr id="berkas<?= $x;?>" style="display: none">
                <td colspan="3">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Kartu Pelajar</b><br>
                                <img src="/images/kartupelajar/{{$data->kartu_pelajar}}" class="img img-fluid img-thumbnail" style="max-witdh:200px;max-height:500px">
                        </div>
                        <div class="col-md-4">
                                <b>Bukti Pembayaran</b><br>
                                    <img src="/images/bukti/{{$data->bukti_bayar}}" class="img img-fluid img-thumbnail" style="max-witdh:200px;max-height:500px">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger" style="margin:8px" onclick="closeDetail('<?= $x;?>')">Tutup</button>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $x++; ?>
        @endforeach
    </table>

</div></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function (){
        
    });
        function showDetail(id){
            $('#berkas'+id).slideDown('slow');
        }

        function closeDetail(id){
            $('#berkas'+id).slideUp('slow');
        }
</script>
@stop

@push('css')

@push('js')