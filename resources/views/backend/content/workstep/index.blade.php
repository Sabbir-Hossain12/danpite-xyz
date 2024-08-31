@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Workstep
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
                <h2 class="mb-0">Workstep List</h2>
                <a type="button" data-toggle="modal" data-target="#mainWorkstep" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Workstep</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="workstepinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Title</th>
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
    <div class="modal fade" id="mainWorkstep" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Workstep</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddWorkstep" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="workstep_title" id="workstep_title"
                                placeholder="Title" required>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="workstep_image"
                                id="workstep_image" type="file">
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
    <div class="modal fade" id="editmainWorkstep" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Workstep</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditWorkstep" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="workstep_title" id="workstep_title"
                                placeholder="Title" required>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="workstep_image"
                                id="workstep_image" type="file">
                        </div>
                        <input type="text" name="workstep_id" id="workstep_id" hidden>

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

        var workstepinfo = $('#workstepinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.workstep.data') !!}',
            columns: [{
                    data: 'id'
                }, {
                    data: 'workstep_image',
                    name: 'workstep_image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'workstep_title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="workstepstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="workstepstatusBtn" data-id="' +
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

        //add workstep
        $('#AddWorkstep').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.worksteps.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Workstep',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#workstep_title').val('');
                        $('#workstep_image').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        workstepinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit workstep
        $(document).on('click', '#editWorkstepBtn', function() {
            let workstepId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'worksteps/' + workstepId + '/edit',

                success: function(data) {
                    $('#EditWorkstep').find('#workstep_title').val(data.workstep_title);

                    $('#EditWorkstep').find('#workstep_id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.workstep_image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditWorkstep').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update workstep
        $('#EditWorkstep').submit(function(e) {
            e.preventDefault();
            let workstepId = $('#workstep_id').val();

            $.ajax({
                type: 'POST',
                url: 'workstep/' + workstepId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Workstep',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        $('#EditWorkstep').find('#workstep_title').val('');
                        $('#EditWorkstep').find('#workstep_image').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Workstep update successfully !",
                            icon: "success",
                        });
                        workstepinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete workstep
        $(document).on('click', '#deleteWorkstepBtn', function() {
            let workstepId = $(this).data('id');

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
                    url: 'worksteps/' + workstepId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Workstep has been deleted!", {
                            icon: "success",
                        });
                        workstepinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#workstepstatusBtn', function() {
            let workstepId = $(this).data('id');
            let workstepStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'workstep/status',
                data: {
                    workstep_id: workstepId,
                    status: workstepStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    workstepinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
