@extends('adminlte::page')

@section('title', 'Generate Token - ILITS 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1 style="float:left">Generate Token</h1>
@stop

@section('content')

<br>
@if($message=Session::get('pesan'))
        <div class="alert alert-{{ Session::get('tipe') }}" role="alert">
            {{ $message }}
        </div>
    @endif
<table class="table table-bordered" id="token-table">
    <thead>
        <tr>
            <th>Forda</th>
            <th>Peserta Aktif</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($forda as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->total }}</td>
            <td><a href="/proses_generate_token?id={{$item->id}}"><button class="btn btn-success">Generate Token</button></a></td>
        </tr>
       @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#token-table').DataTable({
            "columns": [
              null,
              { "searchable": false },
              { "searchable": false }
            ] 
        });
    } );
</script>
@stop

@push('css')

@push('js')