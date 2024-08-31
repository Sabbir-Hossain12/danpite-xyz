@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Faq_Images
    @endsection
    <style>
        div#roleinfo_length {
            color: red;
        }

        div#roleinfo_filter {
            color: red;
        }

        div#roleinfo_info {
            color: red;
        }

        td {
            color: black;
        }
    </style>

    {{--    @if(session()->has('message')) --}}
    {{--    <div class="row">--}}
    {{--        <div class="col-12">--}}
    {{--            <div class="alert alert-success">{{Session::get('message')}}</div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    @endif--}}

    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 card card-body rounded p-4 pb-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-0">Faq and Consult Section</h2>

                </div>
            </div>
        </div>


        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    </div>

    {{--Form Starts--}}
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body p-4">
                    <form method="post" action="{{route('administrator.faq_consult_images.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Consult Title</label>
                                        <input class="form-control" type="text" name="consult_title"
                                               placeholder="Enter Main Title"
                                               id="aboutUs_title1" value="{{$data->consult_title}}">
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">FAQ Side Image</label>
                                        <input class="form-control" name="faq_image" type="file"
                                               id="aboutUs_projectCompleted_img" value="">
                                        <img id="proCompletedImg" class="mt-2" src="{{asset($data->faq_image)}}" alt=""
                                             style="width: 100px; height: 100px;">
                                    </div>

   
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="mb-3">
                                    <label for="x_link" class="form-label">Consult Background Images</label>
                                    <input class="form-control" name="consult_bg_image" type="file"
                                           id="aboutUs_sideImg" value="">
                                    <img id="img" class="mt-2" src="{{asset($data->consult_bg_image)}}" alt="" style="width: 100px; height: 100px;">
                                </div>

                                <div class="mb-3">
                                    <label for="x_link" class="form-label">Consult Side Images</label>
                                    <input class="form-control" name="consult_side_image" type="file"
                                           id="aboutUs_sideImg" value="">
                                    <img id="img" class="mt-2" src="{{asset($data->consult_side_image)}}" alt="" style="width: 100px; height: 100px;">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <script>

    

    </script>

@endsection
    
    