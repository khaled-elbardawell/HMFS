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


                {{--                <div class="col-md-6 col-lg-3">--}}
                {{--                    <div class="card report-card">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="d-flex justify-content-between">--}}
                {{--                                <div>--}}
                {{--                                    <p class="text-dark font-weight-semibold font-14">All Reservations</p>--}}
                {{--                                    <h3 class="my-3">{{ $reservationsCount->not_complete_reservations + $reservationsCount->complete_reservations }}</h3>--}}
                {{--                                    <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i> {{ $reservationsCount->not_complete_reservations + $reservationsCount->complete_reservations}}</span>--}}
                {{--                                        All Reservations</p>--}}
                {{--                                </div>--}}
                {{--                                <div class="align-self-center">--}}
                {{--                                    <i class="dripicons-clock report-main-icon  bg-soft-{{$bgColors[2]}} text-{{$bgColors[2]}}"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div><!--end card-body-->--}}
                {{--                    </div><!--end card-->--}}
                {{--                </div> <!--end col-->--}}


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
                                    <i class="dripicons-wallet report-main-icon  bg-soft-{{$bgColors[4]}} text-{{$bgColors[4]}}"></i>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->




            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="header-title mt-0 mb-3">Sessions By Channel</h4>
                                    <div id="barchart" class="apex-charts"></div>
                                </div><!--end col-->
                                <div class="col-lg-4">
                                    <h4 class="header-title mt-0 mb-3">Traffic Sources</h4>
                                    <div class="traffic-card">
                                        <h3 class="text-dark font-weight-semibold">80</h3>
                                        <h5>Right Now</h5>
                                    </div>

                                    <ul class="list-unstyled url-list mb-0">
                                        <li>
                                            <i class="mdi mdi-circle-medium text-success"></i>
                                            <span>Email</span>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle-medium text-pink"></i>
                                            <span>Referral</span>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle-medium text-purple"></i>
                                            <span>Organic</span>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle-medium text-warning"></i>
                                            <span>Direct</span>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle-medium text-secondary"></i>
                                            <span>Campaign</span>
                                        </li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Organic Traffic in USA</h4>

                            <div class="row">
                                <div class="col-lg-7">
                                    <div id="usa" class="drop-shadow-map" style="height: 300px"></div>
                                </div><!--end col-->
                                <div class="col-lg-5 align-self-center">
                                    <div class="">
                                        <span class="text-dark">Texas</span>
                                        <small class="float-right text-muted ml-3 font-13">81%</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <span class="text-dark">Washington</span>
                                        <small class="float-right text-muted ml-3 font-13">68%</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-dark">Wyoming</span>
                                        <small class="float-right text-muted ml-3 font-13">48%</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <span class="text-dark">Virginia</span>
                                        <small class="float-right text-muted ml-3 font-13">32%</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->



            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Audience Overview</h4>
                            <div class="">
                                <div id="liveVisits" class="apex-charts"></div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body bg-light chart-report-card">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <i class="dripicons-user-group report-main-icon bg-card text-dark mr-2"></i>
                                        <div class="media-body align-self-center text-truncate">
                                            <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">140k
                                                <span class="text-success  font-12 font-weight-normal"><i class="mdi mdi-arrow-up mr-1"></i>21%</span>
                                            </h4>
                                            <p class="text-dark font-weight-semibold mb-0 font-14">Users</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </div><!--end col-->
                                <div class="col-lg-4">
                                    <div class="media">
                                        <i class="dripicons-rocket report-main-icon bg-card text-dark mr-2"></i>
                                        <div class="media-body align-self-center text-truncate">
                                            <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">2154
                                                <span class="text-success  font-12 font-weight-normal"><i class="mdi mdi-arrow-up mr-1"></i>21%</span>
                                            </h4>
                                            <p class="text-dark font-weight-semibold mb-0 font-14">Page views</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </div><!--end col-->
                                <div class="col-lg-4">
                                    <div class="media">
                                        <i class="dripicons-preview report-main-icon bg-card text-dark mr-2"></i>
                                        <div class="media-body align-self-center text-truncate">
                                            <h4 class="mt-0 mb-0 font-weight-semibold text-dark font-24">183k
                                                <span class="text-success  font-12 font-weight-normal"><i class="mdi mdi-arrow-up mr-1"></i>21%</span>
                                            </h4>
                                            <p class="text-dark font-weight-semibold mb-0 font-14">Impressions</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Sessions Device</h4>
                            <div id="ana_device" class="apex-charts"></div>
                            <div class="table-responsive mt-4">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Device</th>
                                        <th>Sassions</th>
                                        <th>Day</th>
                                        <th>Week</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Dasktops</th>
                                        <td>1843</td>
                                        <td>-3</td>
                                        <td>-12</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tablets</th>
                                        <td>2543</td>
                                        <td>-5</td>
                                        <td>-2</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobiles</th>
                                        <td>3654</td>
                                        <td>-5</td>
                                        <td>-6</td>
                                    </tr>

                                    </tbody>
                                </table><!--end /table-->
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Browser Used By Users</h4>
                            <div class="table-responsive browser_users">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Browser</th>
                                        <th class="border-top-0">Sessions</th>
                                        <th class="border-top-0">Bounce Rate</th>
                                        <th class="border-top-0">Transactions</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><i class="fab fa-chrome mr-2 text-danger font-16"></i>Chrome</td>
                                        <td>10853<small class="text-muted">(52%)</small></td>
                                        <td> 52.80%</td>
                                        <td>566<small class="text-muted">(92%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fab fa-safari mr-2 text-info font-16"></i>Safari</td>
                                        <td>2545<small class="text-muted">(47%)</small></td>
                                        <td> 47.54%</td>
                                        <td>498<small class="text-muted">(81%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fab fa-internet-explorer mr-2 text-warning font-16"></i>Internet-Explorer</td>
                                        <td>1836<small class="text-muted">(38%)</small></td>
                                        <td> 41.12%</td>
                                        <td>455<small class="text-muted">(74%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fab fa-opera mr-2 text-danger font-16"></i>Opera</td>
                                        <td>1958<small class="text-muted">(31%)</small></td>
                                        <td> 36.82%</td>
                                        <td>361<small class="text-muted">(61%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fab fa-firefox mr-2 text-blue font-16"></i>Firefox</td>
                                        <td>1566<small class="text-muted">(26%)</small></td>
                                        <td> 29.33%</td>
                                        <td>299<small class="text-muted">(49%)</small></td>
                                    </tr><!--end tr-->
                                    </tbody>
                                </table> <!--end table-->
                            </div><!--end /div-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Traffic Sources</h4>
                            <div class="table-responsive browser_users">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Channel</th>
                                        <th class="border-top-0">Sessions</th>
                                        <th class="border-top-0">Prev.Period</th>
                                        <th class="border-top-0">% Change</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="" class="text-primary">Organic search</a></td>
                                        <td>10853<small class="text-muted">(52%)</small></td>
                                        <td>566<small class="text-muted">(92%)</small></td>
                                        <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><a href="" class="text-primary">Direct</a></td>
                                        <td>2545<small class="text-muted">(47%)</small></td>
                                        <td>498<small class="text-muted">(81%)</small></td>
                                        <td> -17.20% <i class="fas fa-caret-down text-danger font-16"></i></td>

                                    </tr><!--end tr-->
                                    <tr>
                                        <td><a href="" class="text-primary">Referal</a></td>
                                        <td>1836<small class="text-muted">(38%)</small></td>
                                        <td>455<small class="text-muted">(74%)</small></td>
                                        <td> 41.12% <i class="fas fa-caret-up text-success font-16"></i></td>

                                    </tr><!--end tr-->
                                    <tr>
                                        <td><a href="" class="text-primary">Email</a></td>
                                        <td>1958<small class="text-muted">(31%)</small></td>
                                        <td>361<small class="text-muted">(61%)</small></td>
                                        <td> -8.24% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><a href="" class="text-primary">Social</a></td>
                                        <td>1566<small class="text-muted">(26%)</small></td>
                                        <td>299<small class="text-muted">(49%)</small></td>
                                        <td> 29.33% <i class="fas fa-caret-up text-success"></i></td>
                                    </tr><!--end tr-->
                                    </tbody>
                                </table> <!--end table-->
                            </div><!--end /div-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

@endsection

