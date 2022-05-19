@extends('layouts.app')

@push('sub-styles')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
                <a href="">
                    <div class="card bg-success card-hover">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <i class="fas fa-file-alt fa-3x"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-title">Permohonan Baru</h4>
                                    Pengajuan permohonan baru dari pemohon.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <div class="card bg-warning card-hover">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <i class="fas fa-file-excel fa-3x"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-title">Revisi Permohonan</h4>
                                    Permohonan sesudah & sebelum di revisi.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <div class="card bg-danger card-hover">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <i class="fas fa-file-powerpoint fa-3x"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-title">Permohonan dalam Proses</h4>
                                    Dalam proses Verifikasi & Validasi Operator.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="">
                    <div class="card bg-info card-hover">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <i class="fas fa-file-pdf fa-3x"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-title">Permohonan Selesai (Arsip)</h4>
                                    Permohonan yang sudah selesai atau terbit.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <figure class="highcharts-figure">
                    <div id="myChartColumn" style="height: 500px"></div>
                </figure>
            </div>
            <div class="col-sm-6">
                <figure class="highcharts-figure">
                    <div id="myChartPie" style="height: 500px"></div>
                </figure>
            </div>
        </div>

    </div>
@endsection
@push('sub-scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/js/themes/gray.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('myChartColumn', {

            chart: {
                type: 'column',
                styledMode: true
            },

            title: {
                text: 'Styling axes and columns'
            },

            yAxis: [{
                className: 'highcharts-color-0',
                title: {
                    text: 'Primary axis'
                }
            }, {
                className: 'highcharts-color-1',
                opposite: true,
                title: {
                    text: 'Secondary axis'
                }
            }],

            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },

            series: [{
                data: [1, 3, 2, 4]
            }, {
                data: [324, 124, 547, 221],
                yAxis: 1
            }]

        });

        Highcharts.chart('myChartPie', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Pie point CSS'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: [
                    ['Apples', 29.9, false],
                    ['Pears', 71.5, false],
                    ['Oranges', 106.4, false],
                    ['Plums', 129.2, false],
                    ['Bananas', 144.0, false],
                    ['Peaches', 176.0, false],
                    ['Prunes', 135.6, true, true],
                    ['Avocados', 148.5, false]
                ],
                showInLegend: true
            }]
        });
    </script>
@endpush
