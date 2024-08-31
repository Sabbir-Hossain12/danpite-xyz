@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Project
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
                <h2 class="mb-0">Project List</h2>
                <a type="button" data-toggle="modal" data-target="#mainProject" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Project</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="projectinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Category</th>
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
    <div class="modal fade" id="mainProject" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Project</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddProject" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Choose Category</label>
                            <select name="category_id" id="category_id" required class="form-control">
                                <option value="">Choose</option>
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image"
                                id="image" type="file">
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
    <div class="modal fade" id="editmainProject" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Project</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditProject" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Choose Category</label>
                            <select name="category_id" id="category_id" required class="form-control">
                                <option value="">Choose</option>
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image"
                                id="image" type="file">
                        </div>
                        <input type="text" name="project_id" id="project_id" hidden>

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

        var projectinfo = $('#projectinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.project.data') !!}',
            columns: [{
                    data: 'id'
                },

                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'title'
                },
                {
                    data: 'projectcategories.title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="projectstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="projectstatusBtn" data-id="' +
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

        //add project
        $('#AddProject').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.projects.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Project',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#title').val('');
                        $('#category_id').val('');
                        $('#description').val('');
                        $('#image').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        projectinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit project
        $(document).on('click', '#editProjectBtn', function() {
            let projectId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'projects/' + projectId + '/edit',

                success: function(data) {
                    $('#EditProject').find('#title').val(data.title);
                    $('#EditProject').find('#category_id').val(data.category_id);
                    $('#EditProject').find('#description').val(data.description);
                    $('#EditProject').find('#project_id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditProject').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update project
        $('#EditProject').submit(function(e) {
            e.preventDefault();
            let projectId = $('#project_id').val();

            $.ajax({
                type: 'POST',
                url: 'project/' + projectId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Project',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        $('#EditProject').find('#title').val('');
                        $('#EditProject').find('#category_id').val('');
                        $('#EditProject').find('#description').val('');
                        $('#EditProject').find('#image').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Project update successfully !",
                            icon: "success",
                        });
                        projectinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete project
        $(document).on('click', '#deleteProjectBtn', function() {
            let projectId = $(this).data('id');

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
                    url: 'projects/' + projectId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Project has been deleted!", {
                            icon: "success",
                        });
                        projectinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#projectstatusBtn', function() {
            let projectId = $(this).data('id');
            let projectStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'project/status',
                data: {
                    project_id: projectId,
                    status: projectStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    projectinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
