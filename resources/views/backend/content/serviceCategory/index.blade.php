@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Servicecategory
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
                <h2 class="mb-0">Service-category List</h2>
                <a type="button" data-toggle="modal" data-target="#create_modal" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Service-category</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="serviceCategoryTable" width="100%" style="text-align: center;">
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

    {{-- create Form --}}
    <div class="modal fade" id="create_modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Servicecategory</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="createForm" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>

                        <div class="form-group mt-2" style="text-align: right">
                            <div class="d-flex justify-content-between">
                                <button type="button" name="btn" data-dismiss="modal"
                                    class="btn btn-secondary" style="float: left">Close</button>
                                <button type="submit" name="btn" class="btn btn-primary AddCourierBtn">Save</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->

    {{-- edit payment icon --}}
    <div class="modal fade" id="edit_modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Servicecategory</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="updateForm" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <input type="text" name="id" id="up_id" hidden>

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="up_title" placeholder="Title" required>
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

        let serviceCategoryTable = $('#serviceCategoryTable').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.get-data') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status == 1) {
                            return '<span class="btn btn-success btn-sm btn-status" data-status="' + data.status + '" id="status_btn" data-id="' +
                                data.id + '">Active</span>';
                        } else {
                            return '<span class="btn btn-warning btn-sm btn-status" data-status="' + data.status + '" id="status_btn" data-id="' +
                                data.id + '" >Inactive</span>';
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

        //add serviceCategory
        $('#createForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('administrator.service-category.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Projectcategory',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        
                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });

                        $('#createForm')[0].reset();
                        serviceCategoryTable.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit serviceCategory
        $(document).on('click', '#editButton', function() {
            let id = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'service-category/' + id + '/edit',

                success: function(data) {
                    $('#updateForm').find('#up_title').val(data.title);
                    $('#updateForm').find('#up_id').val(data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update serviceCategory
        $('#updateForm').submit(function(e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('administrator/service-category') }}/" + id,
                data: formData,
                processData: false,
                contentType: false,

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Servicecategory',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        Swal.fire({
                            title: "Servicecategory update successfully !",
                            icon: "success",
                        });
                        serviceCategoryTable.ajax.reload();
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete serviceCategory
        $(document).on('click', '#delete_btn', function() {
            let id = $(this).data('id');

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
                    url: 'service-category/' + id,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Servicecategory has been deleted!", {
                            icon: "success",
                        });
                        serviceCategoryTable.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
              }
            });

        });

        //status update
        $(document).on('click', '#status_btn', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');
            // console.log(id , status);

            $.ajax({
                type: 'PUT',
                url: 'serviceCategory/status',
                data: {
                    '_token': token,
                    id: id,
                    status: status,
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    serviceCategoryTable.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
