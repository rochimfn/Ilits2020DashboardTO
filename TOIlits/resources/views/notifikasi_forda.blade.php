@extends('adminlte::page')

@section('title', 'Notifikasi Forda - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
<h1 style="float:left">Kelola Notifikasi</h1>&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah" style="float:left;margin-left:8px">Tambah</button>
@stop

@section('content')
<table class="table table-bordered" id="notif-table">
        <thead>
            <tr>
                <th>Nama Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

    
    <!-- Modal Tambah-->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Notif</h5>        
                </div>
                <div class="modal-body">
                    <form action="/tambah_notif" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label>Pesan</label>
                                <input type="text" class="form-control" name="notif" placeholder="" required>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" style="float:right">Save</button>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Notif</h5>        
                    </div>
                    <div class="modal-body">
                        <form action="/edit_notif" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="editId">
                            <div class="form-group">
                                    <label>Nama Pesan</label>
                                    <input type="text" class="form-control" name="editnotif" id="editnotif" placeholder="" required>
                            </div>
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" style="float:right">Save</button>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Notif</h5>        
                        </div>
                        <div class="modal-body">
                            <form action="/hapus_notif" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="deleteId">
                                <p>Apakah anda ingin menghapus Notif ini?</p>
                            
                                <button type="submit" class="btn btn-success" style="float:right">Ya</button>
                                &nbsp;
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;margin-right:8px">Tidak</button>
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
        var data=[];
        @foreach($notif as $e)
            data.push([
                '{{ $e->pengumuman }}',
                '<button class="btn btn-primary" type="button" onclick="edit(\'{{ $e->id }}\',\'{{$e->pengumuman}}\')">Edit</button> <button class="btn btn-danger" type="button" onclick="hapus(\'{{ $e->id }}\')">Hapus</button>'
        ]);
        @endforeach
        $(document).ready( function () {
            $('#notif-table').DataTable({
                data:data
            });
            $('#kalender').datepicker({
                format: "dd-mm-yyyy"
            });
        } );
    
        function hapus(id){
            $('#deleteId').val(id);
            $('#modalDelete').modal({});
        }
        function edit(id,event,tgl){
            $('#editId').val(id);
            $('#editnotif').val(event);
            $('#modalEdit').modal({});
        }  
    </script>
@stop

@push('css')

@push('js')