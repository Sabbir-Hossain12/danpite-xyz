
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
                            @foreach ( App\Models\ServiceCategory::where('status', 1)->get() as $serviceCategory )
                                <li class="dropdown">
                                    <a href="{{ route('services.category', $serviceCategory->slug) }}" class="dropdown-toggle">{{ $serviceCategory->title }} <b class="caret right"></b></a>
                                    <ul class="dropdown-menu">
                                        @foreach ( App\Models\Service::where('status', 1)->where('category_id', $serviceCategory->id)->get() as $row )
                                             <li>
                                                <a href="{{ route('services.sub.category', $row->slug) }}">{{ $row->title }}</a>
                                            </li>
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
                <i class='bx bx-notepad' data-toggle="modal" data-target="#responsive_modal"></i>
                <i class='bx bx-menu-alt-right'></i>
            </div>
        </div>
    </div>
</header>


<!-- Modal -->
<div class="modal fade" id="responsive_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="card position-relative" style="background: #1E4651; color: white;">
                <div class="card-body">
                    <h4 id="sliderh4">Book Your Service</h4>
                    <form  name="form" action="{{route('administrator.appointments.store')}}"  method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control mb-2" style="border-radius: 30px;" required />
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control mb-2" style="border-radius: 30px;" />
                            {{-- <input type="text" name="email" id="email" placeholder="Email" class="form-control mb-2" style="border-radius: 30px;" /> --}}
                            <select name="service_cat" style="border-radius: 30px;" class="form-control mb-2" id="service_cat">
                                    <option value="" disabled selected>Select Service</option>
                                  @foreach ( App\Models\ServiceCategory::where('status', 1)->get() as $item )
                                    <option value="{{ $item->id }}" >{{ $item->title }}</option>
                                  @endforeach
                            </select>

                            <select name="location" id="country" class="form-control mb-2" style="border-radius: 30px;" >
                                <!--<option value="Bangladesh">Bangladesh</option>-->
                                <option value="Singapore">Singapore</option>
                            </select>
                            <div class="check mb-2">
                                <input type="checkbox" name="notification" id="agree" class="mb-2" /> Yes, I would like to receive important updates and notifications on WhatsApp
                            </div>
                            <button type="submit"  class="btn btn-get-started scrollto" style="background:#FF7D44;color: white;font-weight: bold;  border: 2px solid #FF7D44; padding: 2px 6px;">Book an Appointment</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="modal_close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
        </div>
    </div>
  </div>
