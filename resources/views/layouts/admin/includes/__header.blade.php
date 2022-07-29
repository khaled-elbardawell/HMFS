<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{url('home')}}" class="logo">
            <span>
                <img height="90px" src="{{CustomAsset('front/assets/imgs/hmfs_logo_1.svg')}}" alt="HMFS" class="w-100">
            </span>
        </a>
    </div>
    <!--end logo-->
    <!-- Navbar -->

    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-nav float-right mb-0">

            @if(Gate::allows('is_super_admin') && session()->has('organization_id'))
                <li class="hidden-sm">
                    <a class="nav-link waves-effect waves-light" href="{{route('super-admin.preview')}}" >
                        Back To Super Admin <i class="fas fa-eye text-info font-16"></i>
                    </a>
                </li>
           @endif

          @if(!Gate::allows('is_super_admin'))
            <li class="hidden-sm">
                <a class="nav-link dropdown-toggle waves-effect waves-light header-current-organization" data-toggle="dropdown" href="javascript: void(0);" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($userOrganizations as $userOrganization)
                            <a class="dropdown-item" @if($userOrganization->id == session('organization_id')) data-current-organization="true" @endif  href="{{route('change.organization.preview',[$userOrganization->id])}}">
                               <span>{{ $userOrganization->name }}</span><img src="{{CustomAsset("upload/images/full/$userOrganization->file")}}" alt="" class="ml-2 float-right" width="21" height="14"/>
                            </a>
                    @endforeach
                </div>
            </li>
          @endif


            <li class="hidden-sm">
                @php $current_lang = config('laravellocalization.supportedLocales.'.LaravelLocalization::getCurrentLocale()); @endphp
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript: void(0);" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    {{$current_lang['native']}} <img src="{{CustomAsset($current_lang['flag_path'])}}" class="ml-2" width="24" height="16" alt=""/> <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                               <span>{{ $properties['native'] }}</span><img src="{{CustomAsset($properties['flag_path'])}}" alt="" class="ml-2 float-right" width="21" height="14"/>
                            </a>
                    @endforeach
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" href="{{route('chat')}}">
                    <i class="ti-comment noti-icon"></i>
                </a>
            </li>


            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <?php $user_image = Auth::user()->upload; ?>
                    @isset($user_image->file)
                         <img src="{{CustomAsset('upload/images/full/'.$user_image->file)}}" alt="profile-user" class="rounded-circle" />
                    @endisset
                    <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('profile')}}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-power-off text-muted mr-2">
                        </i> {{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile waves-effect waves-light">
                    <i class="ti-menu nav-icon"></i>
                </button>
            </li>
{{--            <li class="hide-phone app-search">--}}
{{--                <form role="search" class="">--}}
{{--                    <input type="text" id="AllCompo" placeholder="Search..." class="form-control">--}}
{{--                    <a href=""><i class="fas fa-search"></i></a>--}}
{{--                </form>--}}
{{--            </li>--}}
        </ul>
    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->

