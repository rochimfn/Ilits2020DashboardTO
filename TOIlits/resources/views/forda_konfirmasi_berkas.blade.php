@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Konfirmasi Berkas</h1>
@stop

@section('content')
<!-- Button trigger modal -->
<!-- Modal -->
<div id="tempatmodal">

</div>
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
                <td><button class="btn btn-primary" onclick="showDetail('<?=$x;?>')">Lihat Berkas</button> <button class="btn btn-success" onclick="showModalTerima('{{$data->id}}')">Terima</button> <button class="btn btn-danger" onclick="showModalTolak('{{$data->id}}')">Tolak</button></td>
            </tr>
            <tr id="berkas<?= $x;?>" style="display: none">
                <td colspan="3">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Kartu Pelajar</b><br>
                                <img src="/images/kartupelajar/{{$data->kartu_pelajar}}" class="img img-fluid img-thumbnail" style="max-witdh:200px;max-height:300px">
                        </div>
                        <div class="col-md-4">
                                <b>Bukti Pembayaran</b><br>
                                    <img src="/images/bukti/{{$data->bukti_bayar}}" class="img img-fluid img-thumbnail" style="max-witdh:200px;max-height:300px">
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

    function showModalTerima(id){
        let html='<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">'+
                '<div class="modal-dialog" role="document">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h5 class="modal-title">Terima Berkas</h5>'+
                        '</div>'+
                        '<form action="/terima_berkas" method="POST">'+
                            '{{csrf_field()}}'+
                            '<input type="hidden" name="idPeserta" value="'+id+'">'+
                        '<div class="modal-body">'+
                            'Apakah anda yakin berkas yang dikirim peserta sudah benar?'+
                        '</div>'+
                        '<div class="modal-footer">'+
                            '<button type="submit" class="btn btn-primary">Ya</button>'+
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>'+
                        '</div></form>'+
                    '</div></div></div>';

                    $('#tempatmodal').html(html);

                    $('#modelId').modal();
    }
    function showModalTolak(id){
        let html='<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">'+
                '<div class="modal-dialog" role="document">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h5 class="modal-title">Terima Berkas</h5>'+
                        '</div>'+
                        '<form action="/tolak_berkas" method="POST">'+
                            '{{csrf_field()}}'+
                            '<input type="hidden" name="idPeserta" value="'+id+'">'+
                        '<div class="modal-body">'+
                            'Apakah anda yakin ingin menolak berkas yang dikirim peserta?'+
                        '</div>'+
                        '<div class="modal-footer">'+
                            '<button type="submit" class="btn btn-primary">Ya</button>'+
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>'+
                        '</div></form>'+
                    '</div></div></div>';

                    $('#tempatmodal').html(html);

                    $('#modelId').modal();
    }
</script>
</script>
@stop

@push('css')

@push('js')