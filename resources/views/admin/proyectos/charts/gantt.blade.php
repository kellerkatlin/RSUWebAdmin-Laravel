@extends('adminlte::page')

@section('title', 'gatt')


@section('content_header')
    <h1>Proyecto</h1>
@stop

@section('content')
    <div id="gantt_here" style='width:100%; height:100%; position:absolute'></div>
@stop
@section('css')

    <style type="text/css">
        html,
        body {
            height: 100%;
            padding: 0px;
            margin: 20px;
            overflow: hidden;
        }
    </style>
@stop
@section('js')

    <script>
        gantt.i18n.setLocale("es");
        gantt.config.drag_resize = false;
        gantt.config.drag_move = false;

        function actualizarEscala() {
            const tasks = gantt.getTaskByTime(new Date(0), new Date());
            const maxDuration = Math.max(...tasks.map(task => task.duration));

            if (maxDuration <= 7) {
                gantt.config.scale_unit = "day";
                gantt.config.step = 1;
                gantt.config.date_scale = "%d %M";
            } else if (maxDuration <= 30) {
                gantt.config.scale_unit = "week";
                gantt.config.step = 1;
                gantt.config.date_scale = "%F  #%W";
            } else {
                gantt.config.scale_unit = "month";
                gantt.config.step = 1;
                gantt.config.date_scale = "%F %Y";
            }
            gantt.render();
        }
        gantt.attachEvent("onAfterTaskUpdate", actualizarEscala);
        gantt.attachEvent("onAfterTaskAdd", actualizarEscala);
        gantt.attachEvent("onAfterTaskDelete", actualizarEscala);
        gantt.init("gantt_here");
        actualizarEscala();
    </script>
@stop
