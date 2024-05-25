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
        width: 1100px;
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
    <div class="container my-3 ">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Listado de Pedidos</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número de Pedido</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pedido #12345</td>
                                <td>2x Pizza de Pepperoni, 1x Refresco de Cola</td>
                                <td>Pendiente</td>
                                <td>
                                    <button class="btn btn-warning">En Preparación</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Pedido #54321</td>
                                <td>1x Hamburguesa con Papas Fritas</td>
                                <td>En Preparación</td>
                                <td>
                                    <button class="btn btn-danger">Listo para Entrega</button>
                                </td>
                            </tr>
                            <!-- Puedes añadir más filas de pedidos aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
