@extends('frontend.master')

@section('maincontent')
    @section('meta')
        <!-- HTML Meta Tags -->
        <title>Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal</title>
        <meta name="description"
              content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
        <meta itemprop="description"
              content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
        <meta itemprop="image" content="{{env('PROD_URL')}}/public/logo.jpg">

        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{env('PROD_URL')}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
        <meta property="og:description"
              content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
        <meta property="og:image" content="{{env('PROD_URL')}}/public/logo.jpg">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
        <meta name="twitter:description"
              content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
        <meta name="twitter:image" content="{{env('PROD_URL')}}/public/logo.jpg">

        <!-- Meta Tags -->
    @endsection

    @forelse ( $sliders as $slider )
        <section id="intro" class="carousel-background" style="background-image: url('{{ asset( $slider->slider_image ) }}')">
            <div class="container" id="featured_services">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 id="sliderh1">Cost and Pricing</h1>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="background: #1E4651;border-radius: 20px;color: white;">
                            <div class="card-body">
                                <h4 id="sliderh4">Book A Free Site Visit </h4>
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
                    </div>
                </div>
            </div>
        </section>
    @empty

    @endforelse
    <!-- #intro -->

    <main id="main">
        <img src="{{ asset('public/scrs.png') }}" alt="" id="scrcimg">
        <section id="services" style="z-index: 9999;position: relative;">
            <div class="container">

                <div class="row mt-4 pt-lg-4">
                    <div class="col-lg-5 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <img src="{{asset($price_info->pricing_info_img)}}" alt=""
                             style="width: 100%;border-radius: 10px;">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <h2 id="whoh1">{{$price_info->pricing_info_title}}</h2>
                        <p style="text-align: left;color: #000;">
                            {{$price_info->pricing_info_description}}
                        </p>
                        <a href="#featured_services" class="btn-get-started scrollto"
                           style="background:#FF7D44;color: white;font-weight: bold;  border: 2px solid #FF7D44;padding: 6px 12px;border-radius:30px;">Contact For a Service</a>
                    </div>
                </div>

            </div>
        </section>

        <img src="{{ asset('public/scrs.png') }}" class="d-none d-lg-block" alt=""
             style="position: absolute;width: 100%;margin-top: -55px;z-index: 99999;">
        <section id="services" style="padding-top:0px;position: relative;z-index: 999999;">
            <div class="container">
                <header class="section-header wow fadeInUp">
                    <h4 style="text-align: center;font-size: 30px;font-weight: bold;color: #187C94;">Packages</h4>
                </header>

                <div class="row mt-4 pt-lg-4">

                    @foreach($package_1 as $package)
                        <div class="col-6 col-lg-3">
                            <div class="card"
                                 style="background: linear-gradient(180deg, rgba(30, 70, 81, 1) 100%, rgba(26, 124, 143, 1) 100%);margin-bottom: 10px;border-radius: 8px;box-shadow: 0px 1px 28px -10px #000;">
                                <div class="card-body pt-4 mt-lg-4" id="packagecardp">
                                    <img src="{{asset($package->image)}}" alt=""
                                         style="width: 40%;transform: scaleX(-1);">
                                    <h4 style="font-size: 20px;color: white; font-weight: bold; padding-top: 20px;">{{$package->title}}</h4>
                                    <p class="topbookss" style="color: #fff;">{{$package->description}}</p>
                                    <h4 class="topbookss" style="color: #FF7D44;font-weight:bold">
                                        TK. {{$package->price}}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>

        <img src="{{ asset('public/scrs.png') }}" alt=""
             style="position: absolute;width: 100%;margin-top: -55px;z-index: 99999;">

        <section id="services"
                 style="padding-top:0px;position: relative;z-index: 999999;background-image:url('public/bgsrc.png');    background-size: cover;background-repeat: no-repeat;">
            <div class="container">
                <div class="row mt-4 pt-lg-4">

                    @foreach($package_2 as $package)
                        <div class="col-6 col-lg-3">
                            <div class="card"
                                 style="background: linear-gradient(180deg, rgba(30, 70, 81, 1) 100%, rgba(26, 124, 143, 1) 100%);margin-bottom: 10px;border-radius: 8px;box-shadow: 0px 1px 28px -10px #000;">
                                <div class="card-body pt-4 mt-lg-4" id="packagecardp">
                                    <h4 id="inteh4" style="color: #fff;">{{$package->title}}</h4>
                                    <h4 class="topbookss" style="color: #FF7D44;font-weight:bold">
                                        TK. {{$package->price}}</h4>
                                    <h4 id="inteh42"
                                        style="font-size: 20px;color: white; font-weight: bold; padding-top: 20px;">{{$package->title_2}}</h4>
                                    <p class="topbooksss" style="color: #fff;">{{$package->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>

        @if($banner)
        <section id="servicess" class="pt-0 d-none d-lg-block" style="background: white;margin-bottom:60px">
            <div class="container">
                <div class="row pb-4 mb-4 pt-4 mt-4">
                    <div class="col-12">
                        <div class="imgb"
                             style="background-image: url({{asset($banner->banner_image)}});    background-size: cover;border-radius: 15px; ">
                            <div class="row">
                                <div class="col-lg-12 col-12" style="    padding: 75px;">
                                    <h2 style="color: white;font-weight: bold;padding-bottom: 12px;">{{$banner->banner_title}}</h2>
                                    <a href="https://wa.me/+6586508260" class="btn btn-primary"
                                       style="background:#FF7D44;color:white;border-radius:30px;padding:15px 52px 15px 52px">Just
                                        Make a Call to Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        @endif



    {{--   Consult --}}
    <section id="services" style="background:none;background-repeat: no-repeat;background-size: cover;background-image: url('{{asset($faq_consult_img->consult_bg_image)}}');">
        <div class="container pb-4 mb-4">

            <div class="row align-items-center mt-4 pt-lg-4 pb-4 mb-4">
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset($faq_consult_img->consult_side_image) }}" alt="" style="width:100%">
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: none;border:none">
                        <div class="card-body">
                            <h4 style="font-size: 27px;font-weight: 600;">{{ $faq_consult_img->consult_title }}</h4>

                            <form action="{{route('administrator.appointments.store')}}" name="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="d-flex">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control mb-2 mr-4" style="border-radius: 30px;" required>
                                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control mb-2" style="border-radius: 30px;" required>
                                    </div>
                                    {{-- <input type="text" name="email" id="email" placeholder="Email" class="form-control mb-2" style="border-radius: 30px;"> --}}
                                    {{-- <div class="d-flex"> --}}
                                        <select name="service_cat" class="form-control mb-2 mr-4" style="border-radius: 30px;" required>
                                            <option disabled selected>Service</option>
                                            @forelse (App\Models\ServiceCategory::where('status', 1)->get() as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                        <select name="location" id="country" class="form-control mb-2" style="border-radius: 30px;">
                                            <option value="" disabled selected>Location</option>
                                            <option value="singapore">Singapore</option>
                                        </select>
                                    {{-- </div> --}}
                                    <div class="check mb-2">
                                        <input type="checkbox" name="notification" id="agree" class="mb-2" > Yes, I would like to receive important updates and notifications on WhatsApp
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-get-started scrollto" style="border-radius: 45px;background:#FF7D44;color: white;font-weight: bold;  border: 2px solid #FF7D44;padding: 6px 12px;">Book an Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-block d-lg-none">
                    <img src="{{ asset($faq_consult_img->consult_side_image) }}" alt="" style="width:100%">
                </div>
            </div>

        </div>
    </section>

    </main>

@endsection
