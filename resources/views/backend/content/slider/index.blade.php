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
    td{
        color:black;
    }
</style>

<div class="row">
    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="h-100 card card-body rounded p-4 pb-0">
            <div class="d-flex justify-content-between" >
                <h2 class="mb-0">Slider List</h2>
                <a type="button" data-toggle="modal" data-target="#mainSlider" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Slider</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="sliderinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Action</th>
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
                    <h5 class="modal-title" style="color: red;">Create New Slider</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddSlider" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="slider_title" id="slider_title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Small Title</label>
                            <input type="text" class="form-control" name="slider_small_title"
                                id="slider_small_title" placeholder="Small Title">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Text</label>
                            <textarea class="form-control" placeholder="Text" name="slider_text" id="slider_text" style="height: 80px;"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Name</label>
                            <input type="text" class="form-control" name="slider_btn_name" id="slider_btn_name"
                                placeholder="Button Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Link</label>
                            <input type="text" class="form-control" name="slider_btn_link" id="slider_btn_link"
                                placeholder="Button Link">
                        </div>


                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button 2 Name</label>
                            <input type="text" class="form-control" name="slider_btn2_name" id="slider_btn2_name"
                                   placeholder="Button 2 Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button 2 Link</label>
                            <input type="text" class="form-control" name="slider_btn2_link" id="slider_btn2_link"
                                   placeholder="Button 2 Link">
                        </div>

                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="slider_image"
                                id="slider_image" type="file">
                        </div>
                        <div class="form-group mt-2" style="text-align: right">
                            <div class="d-flex justify-content-between">
                                <button type="button" name="btn" data-dismiss="modal"
                                    class="btn btn-secondary" style="float: left">Close</button>
                                <button type="submit" name="btn"
                                    class="btn btn-primary AddCourierBtn">Save</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->

    {{-- edit payment icon --}}
    <div class="modal fade" id="editmainSlider" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Slider</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditSlider" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="slider_title" id="slider_title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Small Title</label>
                            <input type="text" class="form-control" name="slider_small_title"
                                id="slider_small_title" placeholder="Small Title">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Text</label>
                            <textarea class="form-control" placeholder="Text" name="slider_text" id="slider_text" style="height: 80px;"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Name</label>
                            <input type="text" class="form-control" name="slider_btn_name"
                                id="slider_btn_name" placeholder="Button Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Link</label>
                            <input type="text" class="form-control" name="slider_btn_link"
                                id="slider_btn_link" placeholder="Button Link">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button 2 Name</label>
                            <input type="text" class="form-control" name="slider_btn2_name" id="slider_btn2_name"
                                   placeholder="Button 2 Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button 2 Link</label>
                            <input type="text" class="form-control" name="slider_btn2_link" id="slider_btn2_link"
                                   placeholder="Button 2 Link">
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="slider_image"
                                id="slider_image" type="file">
                        </div>
                        <input type="text" name="slider_id" id="slider_id" hidden>

                        <div class="m-3 ms-0 mb-0"
                            style="text-align: center;height: 100px;margin-top:20px !important">
                            <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                            <div id="previmg" style="float: left;"></div>
                        </div>
                        <br>
                        <div class="form-group mt-2" style="text-align: right">
                            <div class="submitBtnSCourse">
                                <button type="button" name="btn" data-dismiss="modal"
                                    class="btn btn-secondary" style="float: left">Close</button>
                                <button type="submit" name="btn"
                                    class="btn btn-primary AddCourierBtn">Update</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</div>

<script>
    $(document).ready(function() {
        var token = $("input[name='_token']").val();

        var sliderinfo = $('#sliderinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.slider.data') !!}',
            columns: [{
                    data: 'id'
                }, {
                    data: 'slider_image',
                    name: 'slider_image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'slider_title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="sliderstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="sliderstatusBtn" data-id="' +
                                data.id + '" >Inactive</button>';
                        }


                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        //add slider
        $('#AddSlider').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.sliders.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Slider',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#slider_small_title').val('');
                        $('#slider_title').val('');
                        $('#slider_text').val('');
                        $('#slider_btn_name').val('');
                        $('#slider_btn_link').val('');
                        $('#slider_image').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        sliderinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit slider
        $(document).on('click', '#editSliderBtn', function() {
            let sliderId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'sliders/' + sliderId + '/edit',

                success: function(data) {
                    $('#EditSlider').find('#slider_small_title').val(data
                        .slider_small_title);
                    $('#EditSlider').find('#slider_title').val(data.slider_title);
                    $('#EditSlider').find('#slider_text').val(data.slider_text);
                    $('#EditSlider').find('#slider_btn_name').val(data.slider_btn_name);
                    $('#EditSlider').find('#slider_btn_link').val(data.slider_btn_link);
                    
                    $('#EditSlider').find('#slider_btn2_name').val(data.slider_btn2_name);
                    $('#EditSlider').find('#slider_btn2_link').val(data.slider_btn2_link);
                    $('#EditSlider').find('#slider_id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.slider_image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditSlider').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update slider
        $('#EditSlider').submit(function(e) {
            e.preventDefault();
            let sliderId = $('#slider_id').val();

            $.ajax({
                type: 'POST',
                url: 'slider/' + sliderId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Slider',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditSlider').find('#slider_small_title').val('');
                        $('#EditSlider').find('#slider_title').val('');
                        $('#EditSlider').find('#slider_text').val('');
                        $('#EditSlider').find('#slider_btn_name').val('');
                        $('#EditSlider').find('#slider_btn_link').val('');
                        $('#EditSlider').find('#slider_image').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Slider update successfully !",
                            icon: "success",
                        });
                        sliderinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete slider
        $(document).on('click', '#deleteSliderBtn', function() {
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
                    url: 'sliders/' + sliderId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Slider has been deleted!", {
                            icon: "success",
                        });
                        sliderinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#sliderstatusBtn', function() {
            let sliderId = $(this).data('id');
            let sliderStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'slider/status',
                data: {
                    slider_id: sliderId,
                    status: sliderStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    sliderinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
