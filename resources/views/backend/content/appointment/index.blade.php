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

    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 card card-body rounded p-4 pb-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-0">Consult/Appointment List</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card card-body rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-dark" id="bannerInfo" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- create payment icon --}}
        <div class="modal fade" id="mainSlider" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content card card-body rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Banner</h5>
                        <a type="button" data-dismiss="modal" aria-label="Close">
                            <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                        </a>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="addBanner" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Title</label>
                                <input type="text" class="form-control" name="banner_title"
                                       placeholder="Title" required>
                            </div>


                            <div class="form-floating mb-3">
                                <label for="floatingInput">Button Name</label>
                                <input type="text" class="form-control" name="banner_btn_text"
                                       placeholder="Button Name">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Button Link</label>
                                <input type="text" class="form-control" name="banner_btn_link"
                                       placeholder="Button Link">
                            </div>

                            <div class="mt-4 mb-4">
                                <label for="floatingInput">Banner Image</label>

                                <input class="form-control form-control-lg" name="banner_image"
                                       id="slider_image" type="file">
                            </div>
                            <div class="form-group mt-2" style="text-align: right">
                                <div class="d-flex justify-content-between">
                                    <button type="button" name="btn" data-dismiss="modal"
                                            class="btn btn-secondary" style="float: left">Close
                                    </button>
                                    <button type="submit" name="btn"
                                            class="btn btn-primary AddCourierBtn">Save
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->

        {{-- edit payment icon --}}
        <div class="modal fade" id="editBanner" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content card card-body rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Slider</h5>
                        <a type="button" data-dismiss="modal" aria-label="Close">
                            <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                        </a>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditBanner" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Title</label>
                                <input type="text" class="form-control" name="banner_title" id="banner_title"
                                       placeholder="Title" required>
                            </div>


                            <div class="form-floating mb-3">
                                <label for="floatingInput">Button Name</label>
                                <input type="text" class="form-control" name="banner_btn_text" id="banner_btn_text"
                                       placeholder="Button Name">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Button Link</label>
                                <input type="text" class="form-control" name="banner_btn_link" id="banner_btn_link"
                                       placeholder="Button Link">
                            </div>

                            <div class="mt-4 mb-4">
                                <label for="floatingInput">Banner Image</label>

                                <input class="form-control form-control-lg" name="banner_image"
                                       id="slider_image" type="file">
                                <img id="bannerImg" class="mt-2" src="" alt="" width="70px"/>
                            </div>
                            <div class="form-group mt-2" style="text-align: right">
                                <div class="d-flex justify-content-between">
                                    <button type="button" name="btn" data-dismiss="modal"
                                            class="btn btn-secondary" style="float: left">Close
                                    </button>
                                    <button type="submit" name="btn"
                                            class="btn btn-primary AddCourierBtn">Save
                                    </button>
                                </div>
                            </div>

                            <input type="number" id="bannerId" hidden/>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    </div>

    <script>
        $(document).ready(function () {
            var token = $("input[name='_token']").val();

            var bannerInfo = $('#bannerInfo').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('administrator.appointment.data') !!}',
                columns: [{
                    data: 'id'
                }, 
                    {
                    data: 'name',

                },
                    {
                        data: 'email'
                    },
                    
                    {data: 'phone'},
                    {data: 'service'},
                    {data: 'location'},

                ]
            });

            //add banner
            $('#addBanner').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    uploadUrl: '{{ route('administrator.banners.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function (data) {

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        $('#addBanner').trigger('reset');
                        bannerInfo.ajax.reload();
                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            });

            //edit banner
            $(document).on('click', '#editBannerBtn', function () {
                let bannerId = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'banners/' + bannerId + '/edit',

                    success: function (data) {
                        $('#EditBanner').find('#banner_title').val(data
                            .banner_title);
                        $('#EditBanner').find('#banner_btn_text').val(data.banner_btn_text);
                        $('#EditBanner').find('#banner_btn_link').val(data.banner_btn_link);
                        $('#bannerImg').attr('src', '{{asset('')}}' + data.banner_image);


                        $('#EditBanner').find('#bannerId').val(data
                            .id);
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            });

            //update banner
            $('#EditBanner').submit(function (e) {
                e.preventDefault();
                let sliderId = $('#bannerId').val();

                $.ajax({
                    type: 'POST',
                    url: 'banners/' + sliderId,
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function (data) {


                        Swal.fire({
                            title: "Banner update successfully !",
                            icon: "success",
                        });
                        $('#editBanner').modal('hide');
                        $('#EditBanner').trigger('reset');
                        bannerInfo.ajax.reload();
                    },


                    error: function (error) {
                        console.log('error');
                    }
                });
            });

            //delete slider
            $(document).on('click', '#deleteBannerBtn', function () {
                let sliderId = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: 'banners/' + sliderId,
                            data: {
                                '_token': token
                            },
                            success: function (data) {
                                Swal.fire("banner has been deleted!", {
                                    icon: "success",
                                });
                                bannerInfo.ajax.reload();
                            },
                            error: function (error) {
                                console.log('error');
                            }

                        });


                    }
                });

            });

            //status update
            $(document).on('click', '#bannerStatusBtn', function () {
                let sliderId = $(this).data('id');
                let sliderStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'banner/status',
                    data: {
                        banner_id: sliderId,
                        status: sliderStatus,
                        '_token': token
                    },

                    success: function (data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        bannerInfo.ajax.reload();
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            });

        });
    </script>

@endsection
