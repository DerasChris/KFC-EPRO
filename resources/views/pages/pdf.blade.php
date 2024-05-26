<!DOCTYPE html>
<html>

<head>
    <title>Reporte Ingresos Estimados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }

        .table-success {
            --bs-table-bg: #d1e7dd;
            --bs-table-striped-bg: #c7dcd1;
        }

        .table td,
        .table th {
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: gainsboro;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row align-items-center mb-4">
            <div class="col-sm-4 text-end">
                <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/logo_perfil.png?alt=media&token=1423fcc4-21f0-4375-8970-bd24befdb36e"
                    class="img-fluid" alt="Logo" style="max-height: 100px;">
            </div> 
            <div class="col-sm-4">
                <h1 class="text-start mb-2">{{ $title }}</h1>
                <h2 class="text-start mb-0">{{ $fecha }}</h2>
            </div>
        </div>
        <div class="table-responsive-xxl">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>N° ORDEN</th>
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO</th>
                        <th>MONTO</th>
                    </tr>
                </thead>
                <tbody>
                    {!! $arrVenta !!}
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>