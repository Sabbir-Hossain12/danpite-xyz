@extends('frontend.master')

@section('maincontent')
    @section('meta')
         <!-- HTML Meta Tags -->
         <title>Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal</title>
         <meta name="description" content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">

         <!-- Google / Search Engine Tags -->
         <meta itemprop="name" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
         <meta itemprop="description" content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
         <meta itemprop="image" content="{{env('PROD_URL')}}/public/logo.jpg">

         <!-- Facebook Meta Tags -->
         <meta property="og:url" content="{{env('PROD_URL')}}">
         <meta property="og:type" content="website">
         <meta property="og:title" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
         <meta property="og:description" content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
         <meta property="og:image" content="{{env('PROD_URL')}}/public/logo.jpg">

         <!-- Twitter Meta Tags -->
         <meta name="twitter:card" content="summary_large_image">
         <meta name="twitter:title" content="Professional Painting Service» Bangladesh's No.1 Painting Company || Deyal">
         <meta name="twitter:description" content="Top Rated Painting Service with a hassle-free experience. 755+ Projects planned and executed across Bangladesh, Best Wall Painters, with Super Fast Painting Service">
         <meta name="twitter:image" content="{{env('PROD_URL')}}/public/logo.jpg">
        <!-- Meta Tags -->
    @endsection

    <section id="intro" style="padding: 0;">
        <div class="intro-container" id="contactcar">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{asset('public/frontend/img/')}}/contact.webp" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h3>Professional Painting Service <br>Across Bangladesh</h3>
                                <header class="section-header">
                                    <p style="margin: 0; width:100%;margin-top:10px;">We are a team of professional wall painters in your locale catering to all your painting needs</p>
                                    <h3 id="shh3"></h3>
                                </header>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- #intro -->

<main id="main">

    <section id="services">
        <div class="container">

            <div class="row mt-4 pt-lg-4">

                <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                    <h3><b>Head Office Dhaka, Bangladesh</b></h3>
                    <div class="d-flex">
                        <i class="fa fa-home" style="font-size: 26px;line-height: 45px;color:#187C94"></i>
                        <p style="text-align: left; padding-left: 16px;margin-bottom: 16px;"> 4th Floor, Ma Amena Plaza, Road-2, Mirpur 10, Dhaka,<br>Bangladesh, 1216</p>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone" style="font-size: 26px;color:#187C94"></i>
                        <p style="text-align: left; padding-left: 16px;margin-bottom: 16px;">+8801647368141</p>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone" style="font-size: 26px;color:#187C94"></i>
                        <p style="text-align: left; padding-left: 16px;margin-bottom: 16px;">+8801604417652</p>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope" style="font-size: 20px;color:#187C94"></i>
                        <p style="text-align: left; padding-left: 16px;margin-bottom: 16px;">md.muraiem@gmail.com</p>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope" style="font-size: 20px;color:#187C94"></i>
                        <p style="text-align: left; padding-left: 16px;margin-bottom: 16px;">md.muraiem036@gmail.com</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Danpite Builders Pte ltd.&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://connectionsgame.org/">Connections Unlimited</a>
                        </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 100%;
                                height: 400px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none!important;
                                width: 100%;
                                height: 400px;
                            }

                            .gmap_iframe {
                                height: 400px!important;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="row" id="contactbox">
                <div class="row mt-4 pt-lg-4">
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/bedroom.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/bdexp.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/action.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/bedroom.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/bdexp.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('public/frontend/img/')}}/action.jpg" alt="">
                                <h6>Hire The Best Painting Contractor in Your Location</h6>
                                <p>
                                    The market is flooded with painting contractors. If you have a plan to paint your home be very cautious before selecting the contractors. Painting contractors help to reduce your painting related headache and ensure smooth completion of the painting task.
                                    The whole project will be charted and will be time bounded and professional. Here are some tips to select the best painting contractors in your locality.
                                </p>
                                <a href="">
                                    <small>Read more &nbsp;>></small>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5>June 17, 2023 &nbsp; &nbsp; Comments</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
