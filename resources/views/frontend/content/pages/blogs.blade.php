@php
    $shareButton = Share::currentPage()->whatsapp();
@endphp

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
                <div class="row" id="blogbox">
                    <div class="row pt-lg-4">
                        <div class="col-12">
                            <h4 class="text-center" style="text-transform: uppercase;font-weight: bold;text-decoration: underline;">See Our Latest Blogs</h4>
                        </div>

                        @foreach ( App\Models\Blog::where('status', 1)->get() as $blog)
                            <div class="col-12 col-lg-8 offset-lg-2 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                       <div class="blog_content">
                                            @if ( !empty($blog->image) )
                                                <img src="{{ asset($blog->image)}}" alt="" class="blog_image">
                                            @else
                                                <img src="{{asset('public/frontend/img/')}}/bedroom.jpg" alt="" class="blog_image">
                                            @endif

                                            <h6>{{ $blog->title }}</h6>
                                            <p>{{ $blog->description }}</p>
                                       </div>
                                    </div>

                                    <div class="card_footer">
                                        {{-- Part-1 --}}
                                        <div class="reaction_section">
                                            <ul>
                                                <li>
                                                    <form method="POST" class="like_segment">
                                                        @csrf

                                                        <input type="number" name="blog_id" value="{{ $blog->id }}" hidden>

                                                        <button type="submit" class="like_btn">
                                                            <span class="total_like">{{ $blogSegments->where('blog_id', $blog->id)->where('segment', 'like')->count() }}</span>

                                                           @if ( Auth::check() )
                                                                @if ( !empty(App\Models\LikeSegment::where('user_id', Auth::user()->id)->where('segment', 'like')->where('blog_id', $blog->id)->first()))
                                                                    <i class='bx bx-like text-primary'></i>
                                                                    <span class="like_text text-primary" style="font-weight: 700">Like</span>
                                                                @else
                                                                    <i class='bx bx-like'></i>
                                                                    <span class="like_text">Like</span>
                                                                @endif

                                                            @else
                                                                <i class='bx bx-like'></i>
                                                                <span class="like_text">Like</span>
                                                           @endif

                                                        </button>
                                                    </form>
                                                </li>

                                                <li class="reaction_list comment_line">
                                                    <i class='bx bx-comment-detail'></i>
                                                    <span>Comment</span>
                                                </li>

                                                <li class="reaction_list">
                                                    {{-- <i class='bx bx-share'></i> --}}
                                                    <span>Share</span>
                                                    <span>{!! $shareButton !!}</span>
                                                </li>
                                            </ul>

                                            <div class="comment_field">
                                                <form class="create_comment">
                                                    @csrf

                                                    <input type="text" name="blog_id" value="{{ $blog->id }}" hidden>

                                                    <textarea name="comment" id="comment" class="comment_box_field" placeholder="Comment Here....."></textarea>

                                                    <div class="remove_comment">
                                                        <i class='bx bx-x'></i>
                                                    </div>

                                                    <button type="submit" class="btn_comment_send"><i class='bx bxs-send'></i></button>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- Part-2 --}}
                                        <div class="comment_show">
                                            @if ( $blogComments->count() > 0 )
                                                @foreach ($blogComments as $blogComment)
                                                    @if ( $blogComment->blog_ids == $blog->id )
                                                            <div class="comment_content">
                                                                <img src="{{ asset('public/group3.png') }}" alt="">

                                                                <div class="comment_description">
                                                                    <h3>{{ ucwords($blogComment->name) }}</h3>
                                                                    <span>{{ Carbon\Carbon::parse($blogComment->created_at)->diffForHumans() }}</span>
                                                                    <p>{{ $blogComment->comment }}</p>
                                                                </div>
                                                            </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


@section('subjs')

<script>

    let comment_line = document.querySelectorAll('.comment_line');
    let comment_field = document.querySelectorAll('.comment_field');
    let remove_comment = document.querySelectorAll('.remove_comment');

    comment_line.forEach((item, index) =>{
        item.addEventListener("click", function(){
            //  console.log(index);
            comment_field[index].classList.toggle('comment_active');
        })
    })

    remove_comment.forEach((items, index) =>{
        items.addEventListener("click", function(){
            //  console.log(index);
            comment_field[index].classList.remove('comment_active');
        })
    })


</script>

<script>
      $(document).ready(function(){
         $('.create_comment').submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);
            // console.log(id);

            $.ajax({
                type: 'POST',
                url: "{{ route('blog.comments') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(res){
                    console.log(res);
                    if( res.status === true ){
                        window.location.href = "{{ url('daily-blogs') }}"
                    }
                    else{
                        window.location.href = "{{ route('administrator.login') }}"
                    }
                },
                error: function(error){
                    console.log(error.message);
                }
            })
         })
      })
</script>


{{-- <script>
      $(document).ready(function(){
         $('.like_segment').on('click', function(){
            var id = $(this).attr('data-id');
            // console.log(id);

            $.ajax({
                type: 'POST',
                url: "{{ route('blog.like') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { id: id },
                processData: false,
                contentType: false,
                success: function(res){
                    console.log(res);
                },
                error: function(error){
                    console.log('error');
                }
            })
         })
      })
</script> --}}

@endsection
