<!-- Left Sidenav -->
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li>
            <a class="nav-link" href="{{url('home')}}">
                <i class="fa fa-home"></i>
                <span>Home</span>
            </a>
        </li>

       @if( (Gate::allows('is_super_admin') && session()->has('organization_id')) || (!Gate::allows('is_super_admin') && Gate::allows('role.index')))

            <li>
                <a class="nav-link" href="{{route('role.index')}}">
                    <i class="fab fa-critical-role"></i>
                    <span>Roles</span>
                </a>
            </li>
        @endif

        @can('is_super_admin')
            <li>
                <a class="nav-link" href="{{route('blogs.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Blogs</span>
                </a>
            </li>
        @endcan

        @can('is_super_admin')
            <li>
                <a class="nav-link" href="{{route('contacts.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Contacts</span>
                </a>
            </li>
        @endcan

        @can('is_super_admin')
            <li>
                <a class="nav-link" href="{{route('organization.index')}}">
                    <i class="fa fa-sitemap"></i>
                    <span>Organizations</span>
                </a>
            </li>
        @endcan


        @if( (Gate::allows('is_super_admin') && session()->has('organization_id')) || (!Gate::allows('is_super_admin') && Gate::allows('users.index')))
            <li>
                <a class="nav-link" href="{{route('users.index',['organization_id' => session()->get('organization_id')])}}">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
        @endif


        @if( (Gate::allows('is_super_admin') && session()->has('organization_id')) || (!Gate::allows('is_super_admin') && Gate::allows('board.index')))
            <li>
                <a class="nav-link" href="{{route('board.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Board</span>
                </a>
            </li>
        @endif


       @if( (Gate::allows('is_super_admin') && session()->has('organization_id')) || (!Gate::allows('is_super_admin') && Gate::allows('departments.index')))
            <li>
                <a class="nav-link" href="{{route('departments.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Departments</span>
                </a>
            </li>
      @endif


        @if( (Gate::allows('is_super_admin') && session()->has('organization_id')) || (!Gate::allows('is_super_admin') && Gate::allows('reservation.index')))
            <li>
                <a class="nav-link" href="{{route('reservations.index',['organization_id' => session()->get('organization_id')])}}">
                    <i class="fa fa-users"></i>
                    <span>Reservation</span>
                </a>
            </li>
        @endif




        {{-- <li>
            <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Dashboard</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="../dashboard/analytics-index.html"><i class="ti-control-record"></i>Analytics</a></li>
            </ul>
        </li> --}}
    </ul>
</div>
<!-- end left-sidenav-->
