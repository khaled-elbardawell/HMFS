@extends('layouts.admin.master')

@section('content')
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">HMFS</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row justify-content-center">
                <?php  $bgColors = ['success','danger','purple','dark','info','primary','secondary']; ?>

                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">All Users</p>
                                    <h3 class="my-3">{{ $allUsersCount }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $allUsersCount }}</span> All Users Count</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">All Organizations</p>
                                    <h3 class="my-3">{{ $organizationsCount->count }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $organizationsCount->count }}</span>
                                        All Organizations</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-sitemap report-main-icon  bg-soft-{{$bgColors[5]}} text-{{$bgColors[5]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">All Departments</p>
                                    <h3 class="my-3">{{ $departmentsCount->count }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $departmentsCount->count }}</span>
                                        All Departments</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-view-thumb report-main-icon  bg-soft-{{$bgColors[6]}} text-{{$bgColors[6]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">Not Complete Reservations</p>
                                    <h3 class="my-3">{{ $reservationsCount->not_complete_reservations }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $reservationsCount->not_complete_reservations }}</span>
                                        Not Complete Reservations</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-clock report-main-icon  bg-soft-{{$bgColors[1]}} text-{{$bgColors[1]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">Complete Reservations</p>
                                    <h3 class="my-3">{{ $reservationsCount->complete_reservations }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $reservationsCount->complete_reservations }}</span>
                                        Complete Reservations</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-clock report-main-icon  bg-soft-{{$bgColors[0]}} text-{{$bgColors[0]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">All Roles</p>
                                        <h3 class="my-3">{{ $rolesCount->count }}</h3>
                                        <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $rolesCount->count }}</span>
                                            All Roles</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fab fa-critical-role report-main-icon bg-soft-{{$bgColors[4]}} text-{{$bgColors[4]}}"></i>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->



                @foreach($usersRolesCount as $usersRole)
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">{{$usersRole->name}}</p>
                                        <h3 class="my-3">{{ $usersRole->count }}</h3>
                                        <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $usersRole->count }}</span>
                                            {{$usersRole->name}}</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="dripicons-user-group report-main-icon bg-soft-{{$bgColors[$loop->index]}} text-{{$bgColors[$loop->index]}}"></i>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->
                @endforeach


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">All Boards</p>
                                    <h3 class="my-3">{{ $boardsCount->count }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $boardsCount->count }}</span>
                                        All Boards</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-checklist report-main-icon  bg-soft-{{$bgColors[3]}} text-{{$bgColors[3]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->


                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-semibold font-14">Health Profiles</p>
                                    <h3 class="my-3">{{ $healthProfilesCount->count }}</h3>
                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $healthProfilesCount->count }}</span>
                                        Health Profiles Count</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="dripicons-user-id report-main-icon  bg-soft-{{$bgColors[4]}} text-{{$bgColors[4]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Latest Reservations</h4>
                            <div class="table-responsive browser_users">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">User</th>
                                        <th class="border-top-0">Doctor</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Time</th>
                                        <th class="border-top-0">Status</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                    <?php $statusColors = ['danger','success'] ?>
                                       @foreach($latestReservations as $latestReservation)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$latestReservation->user_name}}</td>
                                                <td>{{$latestReservation->doctor_name}}</td>
                                                <td>{{$latestReservation->reservation_date}}</td>
                                                <td>{{$latestReservation->reservation_time}}</td>
                                                <td><span class="badge badge-{{$statusColors[$latestReservation->status]}}">{{$latestReservation->status_text}}</span></td>
                                            </tr><!--end tr-->
                                      @endforeach
                                    </tbody>
                                </table> <!--end table-->
                            </div><!--end /div-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->



                <div class="col-lg-6">

                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Users</h4>
                            <div id="ana_device" class="apex-charts"></div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

@endsection

@section('js')
    <script>
        const getMyColor = () => {
            let n = (Math.random() * 0xfffff * 1000000).toString(16);
            return '#' + n.slice(0, 6);
        };


        var roles = JSON.parse('{!! json_encode($usersRolesCount)  !!}')
        var all_users = "{{ $allUsersCount }}"

        var series = []
        var labels = []
        var colors = []


        roles.forEach(function (role) {
            labels.push(role['name'])
            series.push((role['count'] / all_users) * 100)
            colors.push(getMyColor())
        })



        var options = {
            chart: {
                height: 250,
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
                        size: '65%'
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

            series: series,
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0,
                offsetY: -13
            },
            labels: labels,
            colors: colors,

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
                    formatter: function (val) {
                        return   val + " %"
                    }
                }
            }

        }

        var chart = new ApexCharts(
            document.querySelector("#ana_device"),
            options
        );

        chart.render();
    </script>

@endsection



