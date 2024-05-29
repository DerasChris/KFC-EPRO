<!-- By: Evelyn Lopez
    Date: 21-05-2024
    Mostrara las secciones en el dashboard segun el idRol que se encuentre logeado en ese momento
-->

@extends('pages.dashboard')

@section('calendar')
    <script>
    $(document).ready(function () {
        /* initialize the calendar
        -----------------------------------------------------------------*/
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
        });
    });
    </script>
    <style>
    body {
        text-align: center;
        font-size: 14px;
        font-family: "Helvetica Nueue", Arial, Verdana, sans-serif;
        background-color: #DDDDDD;
    }

    #wrap {
        flex-wrap: wrap;
        margin: 0 auto;
    }

    #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        text-align: left;
    }

    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }

    .external-event {
        /* try to mimick the look of a real event */
        margin: 10px 0;
        padding: 2px 4px;
        background: #3366CC;
        color: #fff;
        font-size: .85em;
        cursor: pointer;
    }

    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }

    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    #calendar {
        /* 		float: right; */
        margin: 0 auto;
        width: 900px;
        background-color: #FFFFFF;
        border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
    }
    </style>
    <div id='wrap'>
        <div id='calendar'></div>
        <div style='clear:both'></div>
    </div>
@endsection

@section('table-jefeCocina')
    <div class="container">

        @foreach($ordenes_detalle->unique('orden_id') as $orden)
            <form id="formJefeCocina" action="{{ route('updateOrdenJefe.index') }}" method="POST">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Orden #{{$orden->orden_id}} | {{ $orden->cliente }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nombre del Ítem</th>
                                        <th>Cantidad</th>
                                        <th>Precio de la Orden</th>
                                        <th>Estado de la orden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ordenes_detalle->where('orden_id', $orden->orden_id) as $detalle)
                                        <tr>
                                            <td>{{ $detalle->item_nombre }}</td>
                                            <td>{{ $detalle->item_cantidad }}</td>
                                            <td>{{ $detalle->item_precio_orden }}</td>
                                            <td>{{ $orden->estado_orden }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="orden_id" value="{{ $orden->orden_id }}">
                        <input type="hidden" name="estado" value="{{ $orden->estado_orden }}">
                        <input type="hidden" name="rol" value="{{ $rol->idRol }}">
                        
                        @if($orden->estado_orden == 'Pendiente')
                            <button class="btn btn-warning" type="submit" value="{{ $orden->estado_orden }}">Iniciar Preparación</button>
                        @elseif($orden->estado_orden == 'En Proceso')
                            <button class="btn btn-danger" type="submit" value="{{ $orden->estado_orden }}">Listo para Entrega</button>
                        @endif
                        <p style="display: inline-block; margin-left: 20px;">Estado: {{ $orden->estado_orden }}</p>
                    </div>
                </div>
            </form>
        @endforeach

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('table-cajero')
    <div class="container">
        @foreach($ordenes_detalle->unique('orden_id') as $orden)
            <form id="formCajero" action="{{ route('updateOrdenCaja.index') }}" method="POST">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Orden #{{$orden->orden_id}} | {{ $orden->cliente }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nombre del Ítem</th>
                                        <th>Cantidad</th>
                                        <th>Precio de la Orden</th>
                                        <th>Estado de la orden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ordenes_detalle->where('orden_id', $orden->orden_id) as $detalle)
                                        <tr>
                                            <td>{{ $detalle->item_nombre }}</td>
                                            <td>{{ $detalle->item_cantidad }}</td>
                                            <td>{{ $detalle->item_precio_orden }}</td>
                                            <td>{{ $orden->estado_orden }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="ordenid_cj" value="{{ $orden->orden_id }}">
                        <input type="hidden" name="rolcj" value="{{ $rol->idRol }}">
                        <input type="hidden" name="estadocj" value="{{$orden->estado_orden}}">
                        
                        <button class="btn btn-warning" type="submit" name="Entregada">Orden Entregada</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>

@endsection
