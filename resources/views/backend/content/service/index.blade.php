@php
   $serviceCategories =  App\Models\ServiceCategory::where('status', 1)->get();
@endphp

@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Service
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
                <h2 class="mb-0">Service List</h2>
                <a type="button" data-toggle="modal" data-target="#create_modal" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Service</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="serviceTable" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Main Image</th>
                            <th>Thumbnail</th>
                            <th>Icon Image</th>
                            <th>Description</th>
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
                    <h5 class="modal-title" style="color: red;">Create New Service</h5>
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

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Category</label>
                            <select name="category_id" class="form-control" id="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($serviceCategories as $serviceCategory)
                                    <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="main_img">Main Image</label>
                            <input class="form-control form-control-lg" name="main_img" id="main_img" type="file">
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="thumbnail">Thumbnail</label>
                            <input class="form-control form-control-lg" name="thumbnail" id="thumbnail" type="file">
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="icon_img">Icon Image</label>
                            <input class="form-control form-control-lg" name="icon_img" id="icon_img" type="file">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="Description Here...." name="description" id="description" style="height: 80px;"></textarea>
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
                    <h5 class="modal-title" style="color: red;">Edit Service</h5>
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

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Category</label>
                            <select name="category_id" class="form-control" id="up_category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($serviceCategories as $serviceCategory)
                                    <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="up_main_img">Main Image</label>
                            <input class="form-control form-control-lg" name="main_img" id="up_main_img" type="file">

                            <div id="image_show1"></div>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="up_thumbnail">Thumbnail</label>
                            <input class="form-control form-control-lg" name="thumbnail" id="up_thumbnail" type="file">

                            <div id="image_show2"></div>
                        </div>

                        <div class="mt-4 mb-4">
                            <label for="up_icon_img">Icon Image</label>
                            <input class="form-control form-control-lg" name="icon_img" id="up_icon_img" type="file">

                            <div id="image_show3"></div>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="up_description">Description</label>
                            <textarea class="form-control" placeholder="Description Here...." name="description" id="up_description" style="height: 80px;"></textarea>
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

        let serviceTable = $('#serviceTable').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax:  "{{ route('administrator.service.get-data') }}" ,
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'category_id'
                },
                {
                    data: 'main_img'
                },
                {
                    data: 'thumbnail'
                },
                {
                    data: 'icon_img'
                },
                {
                    data: 'description'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        //add service
        $('#createForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('administrator.service.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Service',
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
                        serviceTable.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit service
        $(document).on('click', '#editButton', function() {
            let id = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'service/' + id + '/edit',

                success: function(data) {
                    $('#updateForm').find('#up_title').val(data.title);
                    $('#updateForm').find('#up_id').val(data.id);
                    $('#updateForm').find('#up_description').val(data.description);
                    $('#updateForm').find('#up_category_id').val(data.category_id);
                    $('#image_show1').html('');
                    $('#image_show1').append(`
                        <img src={{ asset("`+ data.main_img +`") }} alt="" style="width: 75px;">
                    `);
                    $('#image_show2').html('');
                    $('#image_show2').append(`
                        <img src={{ asset("`+ data.thumbnail +`") }} alt="" style="width: 75px;">
                    `);
                    $('#image_show3').html('');
                    $('#image_show3').append(`
                        <img src={{ asset("`+ data.icon_img +`") }} alt="" style="width: 75px;">
                    `);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update service
        $('#updateForm').submit(function(e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('administrator/service') }}/" + id,
                data: formData,
                processData: false,
                contentType: false,

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Service',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        Swal.fire({
                            title: "Service update successfully !",
                            icon: "success",
                        });
                        serviceTable.ajax.reload();
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete service
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
                    url: 'service/' + id,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Service has been deleted!", {
                            icon: "success",
                        });
                        serviceTable.ajax.reload();
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
                url: 'serviceCat/status',
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
                    serviceTable.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
