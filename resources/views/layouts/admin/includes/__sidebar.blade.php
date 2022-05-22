<!-- Left Sidenav -->
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li>
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home"></i>
                <span>Home</span>
            </a>
        </li>


        @can('role.index')
            <li>
                <a class="nav-link" href="{{route('role.index')}}">
                    <i class="fab fa-critical-role"></i>
                    <span>Roles</span>
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




        @if(!Gate::allows('is_super_admin') && Gate::allows('users.index'))
                <li>
                   <a class="nav-link" href="{{route('users.index',['organization_id' => 1])}}">
                       <i class="fa fa-users"></i>
                       <span>Users</span>
                   </a>
               </li>
        @endif


        @can('task.index')
            <li>
                <a class="nav-link" href="{{route('task.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Tasks</span>
                </a>
            </li>
        @endcan
        {{-- <li>
            <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Dashboard</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="../dashboard/analytics-index.html"><i class="ti-control-record"></i>Analytics</a></li>
            </ul>
        </li> --}}
    </ul>
</div>
<!-- end left-sidenav-->
