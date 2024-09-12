@extends('frontend.master')

@section('maincontent')
    @section('meta')
        <!-- HTML Meta Tags -->
        <title>Renovation service in singapore || Deyal</title>
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

    @forelse ( $sliders as $slider )
        <section id="intro" class="carousel-background" style="background-image: url('{{asset('public/frontend/img/')}}/price.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 id="sliderh1">Services we offer</h1>
                    </div>

                    <div class="col-md-4">
                        <div class="card pc_appointment" style="background: #1E4651;border-radius: 20px;color: white;">
                            <div class="card-body">
                                <h4 id="sliderh4">Book Your Service</h4>
                                <form  name="form" action="{{route('administrator.appointments.store')}}"  method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control mb-2" style="border-radius: 30px;" required />
                                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control mb-2" style="border-radius: 30px;" />
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control mb-2" style="border-radius: 30px;" />
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

        <section id="services">
            <div class="container">

                <div class="row mt-4 pt-lg-4">
                    <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <img src="{{asset('public/frontend/img/')}}/painting.webp" alt="" style="width: 100%;border-radius: 10px;">
                    </div>
                    <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <p style="text-align: left;font-weight: bold;color: #187C94;">Interior Painting</p>
                        <h3 style="text-align: left;"><b>Super-Fast Interior Painting Service</b></h3>
                        <br>
                        <p style="text-align: left;font-weight: bold;color: #187C94;">Deyal, Top Rated Wall Painters. </p>

                        <p style="text-align: left;color: #1397d5;">
                            Hire the best professionals in town to redecorate your interiors. Choose from our list of top-rated interior painters. <br><br> We at PaintMyWalls, provide a complete solution to all your pricing queries. We give you a rough
                            idea on the price we quote for our services in Dhaka. This not only helps you compare and understand the pricing before making your decision.
                        </p>
                        <button type="submit" id="topbook">Book Now</button>
                    </div>
                </div>

            </div>
        </section>

        <section id="services" style="background: #1397d5;">
            <div class="container">

                <header class=" wow fadeInUp">
                    <h3 style="color: #63ff03;"></h3>
                    <h4 style="text-align: center;font-size: 30px;font-weight: bold;color: #ffffff;">Interion Painting</h4>

                    <p style="color: white;">If you are looking for professional painters for your interion painting project, look no further than deyal you are up for some real good news! Find the best  Interior Painters in Bangladesh. Deyal is the most trusted brand name when it comes to painting and quality of service with utmost client satisfaction. You can enjoy our outstanding painting services, irrespective of where you stay in Bangladesh. Our dedicated team of painters complete each of our projects successfully, and on time. What is exceptional about us is is our unique mode of action.
                        <br><br>
                        You get superfast callbacks for your query. After this, you will be briefed about the project, the expected cost will also be given a colour consultation,(if required). Once you hire us for the project, a dedicated project manager takes charge, heads a professional team of painters and craftsmen and start your work right away. Whether it is an industrial, commercial or a residential painting project, we prove our efficiency in each sector with our expertise that comes from a team of professional painters.
                        <br><br>
                        We cover almost every segment of a painting job. Whether you want to redecorate your workspace inside and out or wish to hire us for a commercial space, we are the right choice to get your work done. Irrespective of its size, we are specialized in painting offices, schools, restaurants, café, shops, hospitals, hotels, and every type of building you can think of. Apart from painting walls, we are also specialized in painting furniture too. Whether you prefer hand painting or spray painting, our team is armed with the best craftsmen, and perform every activity flawlessly. We make use of the latest techniques and best quality paints and give your place the complete transformation you always wanted to see.
                        <br><br>
                        After all, your satisfaction is all we want!</p>
                </header>


            </div>
        </section>

        <section id="services">
            <div class="container">

                <div class="row mt-4 pt-lg-4">
                    <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <p style="text-align: left;font-weight: bold;color: #187C94;">Interior Painting</p>
                        <h3 style="text-align: left;"><b>Super-Fast Interior Painting Service</b></h3>
                        <br>
                        <p style="text-align: left;font-weight: bold;color: #187C94;">Deyal, Top Rated Wall Painters. </p>

                        <p style="text-align: left;color: #1397d5;">
                            Hire the best professionals in town to redecorate your interiors. Choose from our list of top-rated interior painters. <br><br> We at PaintMyWalls, provide a complete solution to all your pricing queries. We give you a rough
                            idea on the price we quote for our services in Dhaka. This not only helps you compare and understand the pricing before making your decision.
                        </p>
                        <button type="submit" id="topbook">Book Now</button>
                    </div>
                    <div class="col-lg-6 col-md-12 box wow bounceInUp text-center" data-wow-duration="1.4s">
                        <img src="{{asset('public/frontend/img/')}}/painting.webp" alt="" style="width: 100%;border-radius: 10px;">
                    </div>

                </div>

            </div>
        </section>

        <section id="services" style="background: #1397d5;">
            <div class="container">

                <header class="section-header wow fadeInUp">
                    <h3 style="color: #63ff03;"></h3>
                    <h4 style="text-align: center;font-size: 30px;font-weight: bold;color: #ffffff;">What Sets Us Apart?</h4>
                </header>

                <div class="row mt-4 pt-lg-4">
                    @forelse ($facilitys as $facility)
                        <div class="col-6 col-lg-3">
                            <div class="card" style="margin: 10px;border-radius: 20px;box-shadow: 0px 1px 28px -10px #000;border: 2px solid #fff;background: #1397d5;color: white;">
                                <div class="card-body" id="bodyinfo" style="text-align: center;border-radius: 20px;padding: 30px 30px 30px 30px;">
                                    <img src="{{asset($facility->facility_image)}}" alt="" style="height: 80px;">
                                    <h4 class="m-0 mt-3">{{ $facility->facility_title }}</h4>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>

                <br>
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" id="topbook">Book Now</button>
                    </div>
                </div>

            </div>
        </section>

        <section id="services">
            <div class="container">

                <div class="row mt-4 pt-lg-4">
                    <div class="col-lg-6">
                        <img src="{{asset('public/frontend/img/')}}/paintman.png" alt="">
                    </div>

                    <div class="col-lg-6" id="pdbig">
                        <img src="{{asset('public/frontend/img/')}}/telephone.png" alt="" style="width: 60px;">
                        <br>
                        <h4 style="font-size: 36px;color: black;margin-top: 25px;"> Looking for the best painting service for your next wall painting project?</h4>
                        <button type="submit" id="topbook">Call Now</button>
                    </div>
                </div>

            </div>
        </section>

        <section id="call-to-actions" class="wow fadeIn">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="background: #26b7db;border-radius: 20px;color: white;">
                            <div class="card-body">
                                <h4 style="font-size: 27px;font-weight: 600;">Let's Connect</h4>
                                <p><strong><span style="color: #ffffff;">Get Free Estimation</span></strong><span style="color: #ffffff;">&nbsp;and Colour Consultation From Our Experts</span></p>

                                <form action="" name="form">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control mb-2" style="border-radius: 30px;">
                                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control mb-2" style="border-radius: 30px;">
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control mb-2" style="border-radius: 30px;">
                                        <select name="country" id="country" class="form-control mb-2" style="border-radius: 30px;">
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Chottogram">Chottogram</option>
                                        </select>
                                        <div class="check mb-2">
                                            <input type="checkbox" name="agree" id="agree" class="mb-2"> Yes, I would like to receive important updates and notifications on WhatsApp
                                        </div>
                                        <a href="#featured-services" class="btn-get-started scrollto" style="color: white;font-weight: bold;  border: 2px solid; padding: 2px 6px;">Book Now</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card" style="top: 25%;background: #fff;border-radius: 20px;color: white;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <img src="{{asset('public/frontend/img/')}}/testimonial-1.jpg" alt="" style="height:40px;width: 40px;border-radius: 50%;">
                                        <div class="info pl-3">
                                            <h4 class="mb-0" style="color: #000;font-size: 14px;">User Name</h4>
                                            <p class="m-0" style="color: #000;">*******</p>
                                        </div>
                                    </div>
                                    <img src="{{asset('public/frontend/img/')}}/google.png" alt="" style="width: 40px;height:40px">
                                </div>
                                <hr>
                                <p class="text-dark" style="text-align: justify;">
                                    The interior paint service was very satisfying and pocket friendly too. I will surely recommend it too everyone. Go for it guys as in bangalore it's difficult to find a good deal with quality like this.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" style="background: #1397d5;padding-top:0px;">
            <div class="container">

                <header class="section-header wow fadeInUp">
                    <h3 style="color: #63ff03;"></h3>
                    <h4 style="text-align: center;font-size: 30px;font-weight: bold;color: #ffffff;">Creating Your Space Together </h4>
                </header>

                <div class="row mt-4 pt-lg-4">
                    @forelse ($worksteps as $workstep)
                        <div class="col-6 col-lg-3">
                            <div class="card" style="    margin: 10px;border-radius: 20px;    box-shadow: 0px 1px 28px -10px #000;">
                                <div class="card-body" style="text-align: center;border-radius: 20px;padding: 30px 30px 30px 30px;">
                                    <img src="{{asset($workstep->workstep_image)}}" alt="" style="height: 80px;transform: scaleX(-1);">
                                    <h4>{{ $workstep->workstep_title }}</h4>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>

            </div>

        </section>

    </main>

@endsection
