@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Websettings
@endsection

<div class="row">

    <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
        <div class="card card-body rounded h-100 p-4">
            <h2 class="mb-4" style="text-align: center;color:red">Website Basic Information Update</h2>
            <form action="{{ route('administrator.websettings.update', $websetting->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $websetting->email }}"
                                id="floatingInput" placeholder="name@example.com">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Phone One</label>
                            <input type="text" class="form-control" name="phone_one"
                                value="{{ $websetting->phone_one }}" id="floatingPassword" placeholder="Phone One">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Phone Two</label>
                            <input type="text" class="form-control" name="phone_two"
                                value="{{ $websetting->phone_two }}" id="floatingPassword" placeholder="Phone Two">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Office Address</label>
                            <textarea class="form-control" placeholder="Office Address" name="address" id="floatingTextarea" style="height: 100px;">{{ $websetting->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email Two</label>
                            <input type="email" class="form-control" name="email_two" value="{{ $websetting->email_two }}"
                                id="floatingInput" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-lg" name="logo" id="formFileLg"
                                type="file">
                        </div>
                        <div class="m-3 ms-0" style="text-align: center;height: 85px;margin-top:50px !important">
                            <h4 style="width:30%;float: left;text-align: left;">LOGO : </h4>
                            <img src="{{ asset($websetting->logo) }}" alt="" srcset=""
                                style="max-height: 100px;">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
        <div class="card card-body rounded h-100 p-4">
            <h2 class="mb-4" style="text-align: center;color:red">Pixel & Analytics</h2>
            <form action="{{ url('/administrator/pixel/analytics', $websetting->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Facebook Pixel</label>
                            <textarea class="form-control" placeholder="Facebook Pixel" name="facebook_pixel" id="floatingTextarea"
                                style="height: 150px;">{{ $websetting->facebook_pixel }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Google Analytics</label>
                            <textarea class="form-control" placeholder="Google Analytics" name="google_analytics" id="floatingTextarea"
                                style="height: 150px;">{{ $websetting->google_analytics }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Footer Text</label>
                            <textarea class="form-control" placeholder="Footer Text" name="marquee_text" id="marquee_text"
                                style="height: 100px;">{{ $websetting->marquee_text }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Newsletter Text</label>
                            <textarea class="form-control" placeholder="Newsletter Text" name="news_text" id="news_text"
                                style="height: 100px;">{{ $websetting->news_text }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Chatbox Script</label>
                            <textarea class="form-control" placeholder="Chatbox Script" name="chat_box" id="chat_box"
                                style="height: 100px;">{{ $websetting->chat_box }}</textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
        <div class="card card-body rounded h-100 p-4">
            <h2 class="mb-4" style="text-align: center;color:red">Social Links Update</h2>
            <form action="{{ url('/administrator/basicinfo/update', $websetting->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Facebook</label>
                            <input type="text" class="form-control" name="facebook"
                                value="{{ $websetting->facebook }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Twitter</label>
                            <input type="text" class="form-control" name="twitter"
                                value="{{ $websetting->twitter }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Google</label>
                            <input type="text" class="form-control" name="google"
                                value="{{ $websetting->google }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp"
                                value="{{ $websetting->whatsapp }}" id="floatingInput">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Instagram</label>
                            <input type="text" class="form-control" name="instagram"
                                value="{{ $websetting->instagram }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Pinterest</label>
                            <input type="text" class="form-control" name="pinterest"
                                value="{{ $websetting->pinterest }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Tiktok</label>
                            <input type="text" class="form-control" name="tiktok"
                                value="{{ $websetting->tiktok }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin"
                                value="{{ $websetting->linkedin }}" id="floatingInput">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Youtube</label>
                            <input type="text" class="form-control" name="youtube"
                                value="{{ $websetting->youtube }}" id="floatingInput">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
        <div class="card card-body rounded h-100 p-4">
            <h2 class="mb-4" style="text-align: center;color:red">Meta Information Update</h2>
            <form action="{{ route('administrator.meta.update', $websetting->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title"
                                value="{{ $websetting->meta_title }}" id="meta_title"
                                placeholder="Meta Title">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Meta Keywords</label>
                            <textarea class="form-control" placeholder="Meta Keywords" name="meta_keyword" id="floatingTextarea" style="height: 100px;">{{ $websetting->meta_keyword }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Meta Description</label>
                            <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="floatingTextarea" style="height: 120px;">{{ $websetting->meta_description }}</textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>

@endsection
