@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Paintingtype
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
                <h2 class="mb-0">Painting Type List</h2>
                <a type="button" data-toggle="modal" data-target="#mainPaintingtype" class="btn-sm btn btn-primary" style="color:white;"> + Create Painting Type</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="paintingtypeinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                    <tr>
                        <th>SL</th>
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

    {{-- create paintingtype icon --}}
    <div class="modal fade" id="mainPaintingtype" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Painting Type</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddPaintingtype" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
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

    {{-- edit paintingtype icon --}}
    <div class="modal fade" id="editmainPaintingtype" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Painting Type</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditPaintingtype" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>
                        <input type="text" name="paintingtype_id" id="paintingtype_id" hidden>

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

        var paintingtypeinfo = $('#paintingtypeinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.paintingtype.data') !!}',
            columns: [{
                data: 'id'
            },
                {
                    data: 'title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="paintingtypestatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="paintingtypestatusBtn" data-id="' +
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

        //add paintingtype
        $('#AddPaintingtype').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.paintingtypes.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Painting Type',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#title').val('');


                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        paintingtypeinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });


        //edit paintingtype
        $(document).on('click', '#editPaintingtypeBtn', function() {
            let paintingtypeId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'paintingtypes/' + paintingtypeId + '/edit',

                success: function(data) {
                    $('#EditPaintingtype').find('#title').val(data.title);
                    $('#EditPaintingtype').find('#paintingtype_id').val(data.id);
                    $('#EditPaintingtype').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update paintingtype
        $('#EditPaintingtype').submit(function(e) {
            e.preventDefault();
            let paintingtypeId = $('#paintingtype_id').val();

            $.ajax({
                type: 'POST',
                url: 'paintingtype/' + paintingtypeId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update painting type',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        $('#EditPaintingtype').find('#title').val('');

                        Swal.fire({
                            title: "Paintingtype update successfully !",
                            icon: "success",
                        });
                        paintingtypeinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });



        //delete paintingtype
        $(document).on('click', '#deletePaintingtypeBtn', function() {
            let paintingtypeId = $(this).data('id');

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
                        url: 'paintingtypes/' + paintingtypeId,
                        data: {
                            '_token': token
                        },
                        success: function(data) {
                            Swal.fire("Painting Type has been deleted!", {
                                icon: "success",
                            });
                            paintingtypeinfo.ajax.reload();
                        },
                        error: function(error) {
                            console.log('error');
                        }

                    });


                }
            });

        });

        //status update
        $(document).on('click', '#paintingtypestatusBtn', function() {
            let paintingtypeId = $(this).data('id');
            let paintingtypeStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'paintingtype/status',
                data: {
                    paintingtype_id: paintingtypeId,
                    status: paintingtypeStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    paintingtypeinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });



    });
</script>




@endsection
