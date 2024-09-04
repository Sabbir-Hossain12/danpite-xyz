
<header id="header" style="z-index: 99999999">
    <div class="container-fluid">

        <div class="main_nav_container_div">
            <div id="logo" class="pull-left">
                <a href="{{ url('/') }}"><img src="{{asset($setting->logo)}}" alt="" title="" style="width: 85px; margin-top: -10px;" /></a>
            </div>

            {{-- @foreach (App\Models\ServiceCategory::where('status', 1)->get() as $serviceCategory)
                <li><a href="{{ route('services.category', $serviceCategory->slug) }}">{{ $serviceCategory->title }}</a></li>
                @endforeach --}}

            <nav class="nav-menu-container">
                <ul class="nav-menu">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Services <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                            @foreach (App\Models\ServiceCategory::where('status', 1)->get() as $serviceCategory)
                                <li class="dropdown">
                                    <a href="{{ route('services.category', $serviceCategory->slug) }}" class="dropdown-toggle">{{ $serviceCategory->title }} <b class="caret right"></b></a>
                                    <ul class="dropdown-menu">
                                        @foreach (App\Models\Service::where('status', 1)->where('category_id', $serviceCategory->id)->get() as $row)
                                             <li><a href="{{ route('services.category', $serviceCategory->slug) }}">{{ $row->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ url('priceing') }}">Pricing</a></li>
                    <li><a href="{{ url('daily-blogs') }}">Blog</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li>
                        @if ( Auth::check() )
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                        @else
                            <a href="{{ url('login') }}">Login</a>
                        @endif
                    </li>
                    <li id="limt">
                        <p class="m-0 p-0" style="color: #FAD105;font-size: 12px;">for appointment or query</p>
                        <a href="tel: {{ App\Models\Websetting::first()->phone_one }}" style="padding-left:0px;font-size: 20px;color: #FAD105;">{{ App\Models\Websetting::first()->phone_one }}</a>
                    </li>
                </ul>

                <div class="drawer_close">
                    <i class='bx bx-x'></i>
                </div>
            </nav>

            <div class="hamburger_menu">
                <i class='bx bx-menu-alt-right' ></i>
            </div>
        </div>
    </div>
</header>
