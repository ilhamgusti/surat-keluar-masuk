@extends('layouts.vertical-2-master')

@section('title', 'Proyek Monitoring')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                @component('common-components.breadcrumb')
                    @slot('title') Dashboard @endslot
                    @slot('item1') @endslot
                    @slot('item2') @endslot
                @endcomponent

            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->

        {{-- content --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="jumbotron mb-0 bg-light">
                            <h1 class="display-4">Selamat Datang!</h1>
                            {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
                            <hr class="my-4">
                            {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                            {{-- <a class="btn btn-gradient-primary btn-lg" href="#" role="button">Learn more</a> --}}
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Overview</h4>
                        <div class="">
                            <div id="ana_dash_1" class="apex-charts"></div>
                        </div>
                    </div>
                    <!--end card-body-->
                    <div class="card-body bg-light-alt chart-report-card">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-4">
                                <div class="media mb-3 mb-lg-0">
                                    <div class="report-main-icon bg-card mr-2">
                                        <i data-feather="box" class="align-self-center icon-dual-2"></i>
                                    </div>
                                    <div class="media-body align-self-center text-truncate">
                                        <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">5
                                            {{-- <span class="text-success  font-12 font-weight-normal"><i
                                                    class="mdi mdi-arrow-up mr-1"></i>21%</span> --}}
                                        </h4>
                                        <p class="text-dark font-weight-semibold mb-0 font-14">Ongoing</p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="media mb-3 mb-lg-0">
                                    <div class="report-main-icon bg-card mr-2">
                                        <i data-feather="check-circle" class="align-self-center icon-dual-2"></i>
                                    </div>
                                    <div class="media-body align-self-center text-truncate">
                                        <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">9
                                            {{-- <span class="text-success  font-12 font-weight-normal"><i
                                                    class="mdi mdi-arrow-up mr-1"></i>21%</span> --}}
                                        </h4>
                                        <p class="text-dark font-weight-semibold mb-0 font-14">Done</p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="media mb-3 mb-lg-0">
                                    <div class="report-main-icon bg-card mr-2">
                                        <i data-feather="file" class="align-self-center icon-dual-2"></i>
                                    </div>
                                    <div class="media-body align-self-center text-truncate">
                                        <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">18
                                            {{-- <span class="text-success  font-12 font-weight-normal"><i
                                                    class="mdi mdi-arrow-up mr-1"></i>21%</span> --}}
                                        </h4>
                                        <p class="text-dark font-weight-semibold mb-0 font-14">Invoicing</p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Yearly Overview </h4>
                        <div class="row">
                            <div class="col-6">
                                <div id="eco_categories" class="apex-charts mb-n3"></div>
                            </div>
                            <!--end col-->
                            <div class="col-6 align-self-center">
                                <ul class="list-unstyled">
                                    <li class="list-item mb-2 font-weight-semibold-alt">
                                        <i class="fas fa-play text-primary mr-2"></i>Ongoing
                                    </li>
                                    <li class="list-item mb-2 font-weight-semibold-alt">
                                        <i class="fas fa-play text-success mr-2"></i>Done
                                    </li>
                                    <li class="list-item font-weight-semibold-alt">
                                        <i class="fas fa-play text-pink mr-2"></i>Invoicing
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-sm btn-outline-primary btn-round dual-btn-icon">View
                                    Details <i class="mdi mdi-arrow-right"></i></button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end  card-->
                <!--end  card-->
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div><!-- container -->
@stop


@section('footerScript')
    <script src="{{ URL::asset('plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/chartjs/roundedBar.min.js') }}"></script>
    <script>
        //Device-widget


        var options = {
            chart: {
                height: 235,
                type: 'donut',
                dropShadow: {
                    enabled: true,
                    top: 10,
                    left: 0,
                    bottom: 0,
                    right: 0,
                    blur: 2,
                    color: '#45404a2e',
                    opacity: 0.15
                },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '85%'
                    }
                }
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },

            series: [10, 65, 25, ],
            legend: {
                show: false,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0,
                offsetY: 5
            },
            labels: ["Done", "Ongoing", "Invoicing"],
            colors: ['#506ee4', "#1ccab8", "#fd3c97"],

            responsive: [{
                breakpoint: 600,
                options: {
                    plotOptions: {
                        donut: {
                            customScale: 0.2
                        }
                    },
                    chart: {
                        height: 240
                    },
                    legend: {
                        show: false
                    },
                }
            }],

            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " %"
                    }
                }
            }

        }

        var chart = new ApexCharts(
            document.querySelector("#eco_categories"),
            options
        );

        chart.render();
    </script>

@stop
