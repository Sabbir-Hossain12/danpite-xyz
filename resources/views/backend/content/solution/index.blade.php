@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Solution
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
                <h2 class="mb-0">Solution List</h2>
                <a type="button" data-toggle="modal" data-target="#mainSolution" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Solution</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="solutioninfo" width="100%" style="text-align: center;">
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
    <div class="modal fade" id="mainSolution" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Solution</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddSolution" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="solution_title" id="solution_title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Text</label>
                            <textarea class="form-control" placeholder="Text" name="solution_text" id="solution_text" style="height: 80px;"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Name</label>
                            <input type="text" class="form-control" name="solution_btn_name" id="solution_btn_name"
                                placeholder="Button Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Link</label>
                            <input type="text" class="form-control" name="solution_btn_link" id="solution_btn_link"
                                placeholder="Button Link">
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="floatingInput">Icon/Image</label>
                            <input class="form-control form-control-lg" name="solution_image"
                                id="solution_image" type="file">
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="floatingInput">Background Image 1</label>
                            <input class="form-control form-control-lg" name="solution_bg_image"
                                   id="solution_bg_image" type="file">
                        </div>
{{--              New Section          --}}
                        <div class="form-floating mb-3">
                            <label for="desc_title">Description Title</label>
                            <input type="text" class="form-control" name="desc_title" id="desc_title"
                                   placeholder="Button Link">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="desc_text">Description Text</label>
                            <textarea class="form-control" placeholder="Text" name="desc_text" id="desc_text" style="height: 80px;"></textarea>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="desc_image">Description Image</label>
                            <input class="form-control form-control-lg" name="desc_image"
                                   id="desc_image" type="file">
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="bg_img">Background Image 2</label>
                            <input class="form-control form-control-lg" name="bg_img"
                                   id="bg_img" type="file">
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="img_position_type">Image Position</label>
                            <select class="form-control form-control-lg" name="img_position_type" id="img_position_type">
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
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
    <div class="modal fade" id="editmainSolution" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Solution</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditSolution" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="solution_title" id="solution_title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingTextarea">Text</label>
                            <textarea class="form-control" placeholder="Text" name="solution_text" id="solution_text" style="height: 80px;"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Name</label>
                            <input type="text" class="form-control" name="solution_btn_name"
                                id="solution_btn_name" placeholder="Button Name">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Button Link</label>
                            <input type="text" class="form-control" name="solution_btn_link"
                                id="solution_btn_link" placeholder="Button Link">
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="floatingInput">Icon/Image</label>
                            <input class="form-control form-control-lg" name="solution_image"
                                id="solution_image" type="file">
                        </div>
                        <div class="m-3 ms-0 mb-0"
                             style="text-align: center;height: 100px;margin-top:20px !important">
                            <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                            <div id="previmg1" style="float: left;"></div>
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="floatingInput">Background Image</label>
                            <input class="form-control form-control-lg" name="solution_bg_image"
                                   id="solution_bg_image" type="file">
                        </div>
                        <input type="text" name="solution_id" id="solution_id" hidden>

                        <div class="m-3 ms-0 mb-0"
                            style="text-align: center;height: 100px;margin-top:20px !important">
                            <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                            <div id="previmg2" style="float: left;"></div>
                        </div>
                        <br>
{{--                      new  --}}

                        <div class="form-floating mb-3">
                            <label for="desc_title">Description Title</label>
                            <input type="text" class="form-control" name="desc_title" id="desc_title"
                                   placeholder="Button Link">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="desc_text">Description Text</label>
                            <textarea class="form-control" placeholder="Text" name="desc_text" id="desc_text" style="height: 80px;"></textarea>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="desc_image">Description Image</label>
                            <input class="form-control form-control-lg" name="desc_image"
                                   id="desc_image" type="file">
                        </div>
                        <div class="m-3 ms-0 mb-0"
                             style="text-align: center;height: 100px;margin-top:20px !important">
                            <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                            <div id="previmg3" style="float: left;"></div>
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="bg_img">Background Image 2</label>
                            <input class="form-control form-control-lg" name="bg_img"
                                   id="bg_img" type="file">
                        </div>
                        <div class="m-3 ms-0 mb-0"
                             style="text-align: center;height: 100px;margin-top:20px !important">
                            <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                            <div id="previmg4" style="float: left;"></div>
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="img_position_type">Image Position</label>
                            <select class="form-control form-control-lg" name="img_position_type" id="img_position_type">
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                        
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

        var solutioninfo = $('#solutioninfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.solution.data') !!}',
            columns: [{
                    data: 'id'
                }, {
                    data: 'solution_image',
                    name: 'solution_image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'solution_title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="solutionstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="solutionstatusBtn" data-id="' +
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

        //add solution
        $('#AddSolution').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.solutions.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Solution',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#solution_title').val('');
                        $('#solution_text').val('');
                        $('#solution_btn_name').val('');
                        $('#solution_btn_link').val('');
                        $('#solution_image').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        solutioninfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit solution
        $(document).on('click', '#editSolutionBtn', function() {
            let solutionId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'solutions/' + solutionId + '/edit',

                success: function(data) {
                    $('#EditSolution').find('#solution_title').val(data.solution_title);
                    $('#EditSolution').find('#solution_text').val(data.solution_text);
                    $('#EditSolution').find('#solution_btn_name').val(data.solution_btn_name);
                    $('#EditSolution').find('#solution_btn_link').val(data.solution_btn_link);
                    $('#EditSolution').find('#desc_title').val(data.desc_title);
                    $('#EditSolution').find('#desc_text').val(data.desc_text);
                    $('#EditSolution').find('#img_position_type').val(data.img_position_type);

                    $('#EditSolution').find('#solution_id').val(data.id);

                    $('#previmg1').html('');
                    $('#previmg2').html('');
                    $('#previmg1').append(`
                        <img  src="../` + data.solution_image + `" alt = "" style="height: 80px" />
                    `); 
                    
                    $('#previmg2').append(`
                        <img  src="../` + data.solution_bg_image + `" alt = "" style="height: 80px" />
                    `);
                    $('#previmg3').append(`
                        <img  src="../` + data.desc_image + `" alt = "" style="height: 80px" />
                    `);
                    $('#previmg4').append(`
                        <img  src="../` + data.bg_img + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditSolution').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update solution
        $('#EditSolution').submit(function(e) {
            e.preventDefault();
            let solutionId = $('#solution_id').val();

            $.ajax({
                type: 'POST',
                url: 'solution/' + solutionId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Solution',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditSolution').find('#solution_title').val('');
                        $('#EditSolution').find('#solution_text').val('');
                        $('#EditSolution').find('#solution_btn_name').val('');
                        $('#EditSolution').find('#solution_btn_link').val('');
                        $('#EditSolution').find('#solution_image').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Solution update successfully !",
                            icon: "success",
                        });
                        solutioninfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete solution
        $(document).on('click', '#deleteSolutionBtn', function() {
            let solutionId = $(this).data('id');

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
                    url: 'solutions/' + solutionId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Solution has been deleted!", {
                            icon: "success",
                        });
                        solutioninfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#solutionstatusBtn', function() {
            let solutionId = $(this).data('id');
            let solutionStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'solution/status',
                data: {
                    solution_id: solutionId,
                    status: solutionStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    solutioninfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
