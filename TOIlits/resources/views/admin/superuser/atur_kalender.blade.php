@extends('adminlte::page')

@section('title', 'dashboard')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Event Mendatang</h1>&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah" style="float:left;margin-left:8px">Tambah</button>
@stop

@section('content')

    <table class="table table-bordered" id="event-table">
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Tanggal</th>
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
                    <h5 class="modal-title">Tambah Event</h5>        
                </div>
                <div class="modal-body">
                    <form action="/tambah_event" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label>Nama Event</label>
                                <input type="text" class="form-control" name="event" placeholder="" required>
                        </div>
                        <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" name="kalender" id="kalender" placeholder="" required readonly>
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
                        <h5 class="modal-title">Edit Event</h5>        
                    </div>
                    <div class="modal-body">
                        <form action="/edit_event" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="editId">
                            <div class="form-group">
                                    <label>Nama Event</label>
                                    <input type="text" class="form-control" name="editEvent" id="editEvent" placeholder="" required>
                            </div>
                            <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control" name="editKalender" id="editKalender" placeholder="" required readonly>
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
                            <h5 class="modal-title">Hapus Event</h5>        
                        </div>
                        <div class="modal-body">
                            <form action="/hapus_event" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="deleteId">
                                <p>Apakah anda ingin menghapus event ini?</p>
                            
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
    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
<script src="datepicker/js/bootstrap-datepicker.js"></script>
<script>
    var data=[];
    @foreach($event as $e)
        data.push([
            '{{ $e->event }}',
            '{{ $e->tgl }}',
            '<button class="btn btn-primary" type="button" onclick="edit(\'{{ $e->id }}\',\'{{$e->event}}\',\'{{$e->tgl}}\')">Edit</button> <button class="btn btn-danger" type="button" onclick="hapus(\'{{ $e->id }}\')">Hapus</button>'
    ]);
    @endforeach
    $(document).ready( function () {
        $('#event-table').DataTable({
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
        $('#editEvent').val(event);
        var date = new Date(tgl);
        var newDate = date.getDate()+"-"+(date.getMonth()+1)+"-"+date.getFullYear();
        $('#editKalender').val(newDate);
        $('#editKalender').datepicker({
            format: "dd-mm-yyyy"
        });
        $('#modalEdit').modal({});
    }
</script>
@stop

@push('css')

@push('js')