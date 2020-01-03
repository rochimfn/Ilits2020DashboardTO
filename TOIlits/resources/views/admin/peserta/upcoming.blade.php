@extends('adminlte::page')

@section('title', 'Event Mendatang - Ini Lho ITS! 2020')
<link rel="icon" href="{!! asset('images/logokecil.png') !!}"/>

@section('content_header')
    <h1>Event Mendatang</h1>
@stop

@section('content')
<div class="monthly" id="mycalendar"></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/monthly/css/monthly.css">
@stop

@section('js')>
<script src="/monthly/js/monthly.js"></script>
<script>
    $event={
        "monthly":[
            <?php $x=1;?>
            @foreach($event as $e)
                {
                    "id":<?= $x; ?>,
                    "name":"{{$e->event}}",
                    "startdate": "{{$e->tgl}}",
		            "enddate": "{{$e->tgl}}",
		            "starttime": "",
		            "endtime": "",
		            "color": "#e74c3c",
		            "url": ""
                },
                <?php $x++; ?>
            @endforeach
        ]
    }
        $(document).ready( function() {
            $('#mycalendar').monthly({
                mode: 'event',
                dataType: 'json',
                events: $event
            });
        });
</script>
@stop

@push('css')

@push('js')