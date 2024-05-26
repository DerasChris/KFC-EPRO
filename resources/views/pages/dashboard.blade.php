<?php date_default_timezone_set('America/El_Salvador'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Dashboard {{ $rol->nombreRol }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/dashboard/dashboard.css')}}?v=2.0.4" rel="stylesheet" />
    <!-- ESTILOS GENERALES -->
    @include('layouts.adicionales')
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- SIDEBAR (MENU) -->
    @include('layouts.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- NAVBAR (HEADER) -->
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $card['title'][1] }}
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $card['data'][1] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <img src="{{ $card['img'][1] }}" class="icon icon-shape" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $card['title'][2] }}
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $card['data'][2] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <img src="{{ $card['img'][2] }}" class="icon icon-shape" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($card['title'][3]))
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $card['title'][3] }}
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $card['data'][3] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="bg-gradient-success shadow-success text-center rounded-circle">
                                        <img src="{{ $card['img'][3] }}" class="icon icon-shape" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">FECHA</p>
                                        <h5 class="font-weight-bolder">
                                            <?= date('d-M-Y') ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/calendario.png?alt=media&token=479c1848-0a74-4ce3-9010-8cb199b05be6"
                                            class="icon icon-shape" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="dashboard">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    @switch($rol->idRol)
                    @case(1)
                    @yield('table-jefeCocina')
                    @break
                    @case(4)
                    @yield('calendar')
                    @break
                    @endswitch
                </div>
            </div>

            <div class="row mt-4" id="ingresos" style="display: none;">
                <div class="w-100 col-lg-7 mb-lg-0 mb-4">
                    <div class="border-light container mb-3 ">
                      <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Total Entregados</th>
                                        <th>Ingresos Estimados</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {!! $ingresos !!}
                                </tbody>
                            </table>
                        </div>
                      </div>    
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </main>

    <!--   Core JS Files   -->
    <script src="{{asset('js/admin/core/popper.min.js')}}"></script>
    <script src="{{asset('js/admin/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/chartjs.min.js')}}"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    document.getElementById("btn-ingresos").addEventListener("click", function() {
        var divDashboard = document.getElementById("dashboard");
        var divIngresos = document.getElementById("ingresos");
        if (divIngresos.style.display === "none" || divIngresos.style.display === "") {
            divIngresos.style.display = "block";
            divDashboard.style.display = "none";
        } else {
            divIngresos.style.display = "none";
            divDashboard.style.display = "block";
        }
    });
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{asset('js/dashboard/dashboard.min.js')}}?v=2.0.4"></script>
</body>

</html>