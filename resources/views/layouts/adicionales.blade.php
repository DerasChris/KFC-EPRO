<!-- 
    BY. Evelyn Lopez | 21-05-2024
    ESTILOS GENERALES PARA LAS SECCIONES DEL DASHBOARD, RECOMIENDO CONDICIONARLOS PARA EVITAR CONFLICTOS
-->

@if ($rol->idRol == 4)
<!-- ESTILOS DE CALENDARIO -->
  <link href='{{ asset('css/admin/fullcalendar.css')}}' rel='stylesheet' />
  <link href='{{ asset('css/admin/fullcalendar.print.css')}}' rel='stylesheet' media='print' />
  <script src='{{ asset('js/dashboard/jquery-1.10.2.js')}}' type="text/javascript"></script>
  <script src='{{ asset('js/dashboard/jquery-ui.custom.min.js')}}' type="text/javascript"></script>
  <script src='{{ asset('js/admin/fullcalendar.js')}}' type="text/javascript"></script>
@endif