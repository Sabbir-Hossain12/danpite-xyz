@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Slider
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
                    <h2 class="mb-0">About Us</h2>

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
                    <form method="post" action="{{route('administrator.aboutUs.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Title 1</label>
                                        <input class="form-control" type="text" name="aboutUs_title1"
                                               placeholder="Enter 1st title"
                                               id="aboutUs_title1" value="{{$data->aboutUs_title1}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_1" class="form-label">Title 2</label>
                                        <input class="form-control" name="aboutUs_title2" type="text"
                                               placeholder="Enter 2nd title"
                                               id="aboutUs_title2" value="{{$data->aboutUs_title2}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="aboutUs_desc" class="form-label">Description</label>
                                        <textarea class="form-control" name="aboutUs_desc" id="aboutUs_desc">{{$data->aboutUs_desc}}</textarea>
                                    </div>
                                    
                            {{--Project Completed--}}
                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">Project Completed Image</label>
                                        <input class="form-control" name="aboutUs_projectCompleted_img" type="file"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_projectCompleted_img" value="">
                                        <img id="proCompletedImg" class="mt-2" src="{{asset($data->aboutUs_projectCompleted_img)}}" alt=""
                                             style="width: 100px; height: 100px;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Project Completed Title</label>
                                        <input class="form-control" name="aboutUs_projectCompleted_title" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_projectCompleted_title" value="{{$data->aboutUs_projectCompleted_title}}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Project Completed Count</label>
                                        <input class="form-control" name="aboutUs_projectCompleted_count" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_projectCompleted_count" value="{{$data->aboutUs_projectCompleted_count}}">
                                    </div>

                                    {{--    Years Of Service     --}}

                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">Years Of Service Image</label>
                                        <input class="form-control" name="aboutUs_yearsService_img" type="file"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_yearsService_img">
                                        <img id="yearsOfServiceimg"  class="mt-2" src="{{asset($data->aboutUs_yearsService_img)}}" alt="" style="width: 100px; height: 100px;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Years Of Service Title</label>
                                        <input class="form-control" name="aboutUs_yearsService_title" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_yearsService_title" value="{{$data->aboutUs_yearsService_title}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Years Of Service Count</label>
                                        <input class="form-control" name="aboutUs_yearsService_count" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_yearsService_count" value="{{$data->aboutUs_yearsService_count}}">
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">Happy Clients Image</label>
                                        <input class="form-control" name="aboutUs_happyClients_img" type="file"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_happyClients_img" value="">
                                        <img id="img" class="mt-2" src="{{asset($data->aboutUs_happyClients_img)}}" alt="" style="width: 100px; height: 100px;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Happy Clients Title</label>
                                        <input class="form-control" name="aboutUs_happyClients_title" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_happyClients_title" value="{{$data->aboutUs_happyClients_title}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Happy Clients Count</label>
                                        <input class="form-control" name="aboutUs_happyClients_count" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_happyClients_count" value="{{$data->aboutUs_happyClients_count}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">Team Members Image</label>
                                        <input class="form-control" name="aboutUs_teamMembers_img" type="file"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_teamMembers_img" value="">
                                        <img id="img" class="mt-2" src="{{asset($data->aboutUs_teamMembers_img)}}" alt="" style="width: 100px; height: 100px;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Team Members Title</label>
                                        <input class="form-control" name="aboutUs_teamMembers_title" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_teamMembers_title" value="{{$data->aboutUs_teamMembers_title}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="p_link" class="form-label">Team Members Count</label>
                                        <input class="form-control" name="aboutUs_teamMembers_count" type="text"
                                               placeholder="Enter Store Phone Number"
                                               id="aboutUs_teamMembers_count" value="{{$data->aboutUs_teamMembers_count}}">
                                    </div>

                                    {{--    Sidebar Image--}}
                                    <div class="mb-3">
                                        <label for="x_link" class="form-label">Side Image</label>
                                        <input class="form-control" name="aboutUs_sideImg" type="file"
                                               id="aboutUs_sideImg" value="">
                                        <img id="img" class="mt-2" src="{{asset($data->aboutUs_sideImg)}}" alt="" style="width: 100px; height: 100px;">
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
        
        $(document).ready( function (e)
        
            {
                console.log('testing');
            }
        )
        
    </script>

@endsection
    
    