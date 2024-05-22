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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TOTAL ENTREGADOS</p>
                    <h5 class="font-weight-bolder">
                      $53,000
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-primary shadow-primary text-center rounded-circle">
                    <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/buena-resena.png?alt=media&token=1b2d8957-523a-4d0f-a515-b90892395bfa" class="icon icon-shape" alt="">
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TOTAL NO RETIRADOS</p>
                    <h5 class="font-weight-bolder">
                      2,300
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-danger shadow-danger text-center rounded-circle">
                    <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/entrega-rapida.png?alt=media&token=d4b98dea-eee1-43cc-bd43-9179e016a70b" class="icon icon-shape" alt="" srcset="">
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">INGRESOS ESTIMADOS</p>
                    <h5 class="font-weight-bolder">
                      +3,462
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-success shadow-success text-center rounded-circle">
                    <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/salario.png?alt=media&token=d8995bfc-777a-42ed-b301-58651a455a12" class="icon icon-shape" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">DIA</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-warning shadow-warning text-center rounded-circle">
                    <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/calendario.png?alt=media&token=479c1848-0a74-4ce3-9010-8cb199b05be6" class="icon icon-shape" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
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
      @include('layouts.footer')
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{asset('js/admin/core/popper.min.js')}}"></script>
  <script src="{{asset('js/admin/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/admin/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/admin/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/admin/plugins/chartjs.min.js')}}"></script>
  <!-- <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script> -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/dashboard/dashboard.min.js')}}?v=2.0.4"></script>
</body>

</html>