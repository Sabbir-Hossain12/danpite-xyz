@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Pricing-Info
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
                    <h2 class="mb-0">Pricing Info</h2>

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
                    <form method="post" action="{{route('administrator.pricinginfos.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="mb-3">
                                        <label for="banner_title" class="form-label">Banner Title</label>
                                        <input class="form-control" type="text" name="banner_title"

                                               id="banner_title" value="{{$data->banner_title}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pricing_info_title" class="form-label">Pricing Info Title</label>
                                        <input class="form-control" name="pricing_info_title" type="text"
                                               id="pricing_info_title" value="{{$data->pricing_info_title}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pricing_info_description" class="form-label">Pricing Info
                                            Description</label>
                                        <textarea class="form-control" name="pricing_info_description"
                                                  id="pricing_info_description">{{$data->pricing_info_description}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pricing_info_img" class="form-label">Pricing Info Image</label>
                                        <input oninput="imgPreview.src=window.URL.createObjectURL(this.files[0])"
                                               class="form-control" name="pricing_info_img" type="file"
                                               id="pricing_info_img">
                                    </div>
                                    <div id="">
                                        <img src="{{asset($data->pricing_info_img)}}" id="imgPreview"
                                             style="width: 100px; height: 100px;"/>
                                    </div>


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

        $(document).ready(function (e) {
                console.log('testing');
            }
        )

    </script>

@endsection
    
    