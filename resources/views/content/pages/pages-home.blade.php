@php
$configData = Helper::appClasses();
$fechaActual = now();
    $fechaAnterior = now()->subDay();

    // Contar los mensajes creados en el último día
    $mensajesNuevos = App\Models\Message::where('created_at', '>', $fechaAnterior)
                                        ->where('created_at', '<=', $fechaActual)
                                        ->count();

$totalUsuarios = App\Models\User::count();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/gauge-chart/dist/gauge-chart.min.js"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/cards-analytics.js')}}"></script>

<script>
  var temperatureData = {{ $latestData->temperature }};
  var humidityData = {{ $latestData->humidity }};

  var optionsTemperature = {
        chart: {
            type: 'radialBar',
            height: '350'
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '70%'
                },
                dataLabels: {
                    showOn: 'always',
                    name: {
                        offsetY: -10,
                        show: true,
                        color: '#888',
                        fontSize: '17px'
                    },
                    value: {
                        color: '#111',
                        fontSize: '36px',
                        show: true,
                        formatter: function (val) {
                            return val.toFixed(1) + ' °C'; // Mostrar temperatura en grados Celsius
                        }
                    }
                }
            }
        },
        series: [temperatureData],
        labels: ['Temperatura']
    };

  var optionsHumidity = {
      chart: {
          type: 'radialBar',
          height: '350'
      },
      plotOptions: {
          radialBar: {
              hollow: {
                  size: '70%'
              },
              dataLabels: {
                  showOn: 'always',
                  name: {
                      offsetY: -10,
                      show: true,
                      color: '#888',
                      fontSize: '17px'
                  },
                  value: {
                      color: '#111',
                      fontSize: '36px',
                      show: true
                  }
              }
          }
      },
      series: [humidityData],
      labels: ['Humedad']
  };

  var temperatureChart = new ApexCharts(document.querySelector("#temperatureChart"), optionsTemperature);
  var humidityChart = new ApexCharts(document.querySelector("#humidityChart"), optionsHumidity);

  temperatureChart.render();
  humidityChart.render();
</script>
@endsection

@section('content')
<h4>Home Page</h4>
<div class="row">
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
        <div class="card-body text-center">
            <div class="avatar avatar-md mx-auto mb-3">
                <span class="avatar-initial rounded-circle bg-label-info"><i class="bx bx-edit fs-3"></i></span>
            </div>
            <span class="d-block mb-1 text-nowrap">Nuevos Mensajes del Día</span>
            <h2 class="mb-0">{{ $mensajesNuevos }}</h2>
        </div>
    </div>
</div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-dock-top fs-3"></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Reportes</span>
        <h2 class="mb-0">1</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-user-plus"></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Usuarios Registrados</span>
        <h2 class="mb-0">{{ $totalUsuarios }}</h2>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-0 mb-sm-4">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Temperatura</h5>
          </div>
          <div class="card-body text-center">
              <div id="temperatureChart"></div>
          </div>
      </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-0 mb-sm-4">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Humedad</h5>
          </div>
          <div class="card-body text-center">
              <div id="humidityChart"></div>
          </div>
      </div>
  </div>
</div>



@endsection
