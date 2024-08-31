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
                <h2 class="mb-0">Blog List</h2>
                <a type="button" data-toggle="modal" data-target="#mainSlider" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Blog</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="bloginfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
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

                    <form name="form" id="AddBlog" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>

                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image"
                            id="blog_image" type="file">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="descriptions">Description</label>
                            <textarea name="description" id="descriptions" class="form-control" cols="30" rows="10" required></textarea>
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

                    <form name="form" id="EditBlog" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="id" id="up_id" hidden>

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>

                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image"
                                id="image" type="file">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10" required></textarea>
                        </div>


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

        var bloginfo = $('#bloginfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.blog.data') !!}',
            columns: [{
                    data: 'id'
                }, {
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
                    "data": null,
                    render: function(data) {

                        if (data.status == 1) {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="' + data.status + '" id="blogstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="' + data.status + '" id="blogstatusBtn" data-id="' +
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

        //add Blog
        $('#AddBlog').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.blogs.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Blog',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#title').val('');
                        $('#image').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        bloginfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit Blog
        $(document).on('click', '#editBlogBtn', function() {
            let id = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'blogs/' + id + '/edit',

                success: function(data) {
                    $('#EditBlog').find('#up_id').val(data.id);
                    $('#EditBlog').find('#title').val(data.title);
                    $('#EditBlog').find('#description').val(data.description);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditBlog').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update Blog
        $('#EditBlog').submit(function(e) {
            e.preventDefault();
            let id = $('#up_id').val();

            $.ajax({
                type: 'POST',
                url: 'blogs/' + id,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Blog',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditBlog').find('#title').val('');
                        $('#EditBlog').find('#image').val('');
                        $('#EditBlog').find('#description').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Blog update successfully !",
                            icon: "success",
                        });
                        bloginfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete Blog
        $(document).on('click', '#deleteBlogBtn', function() {
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
                    url: 'blogs/' + sliderId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Blog has been deleted!", {
                            icon: "success",
                        });
                        bloginfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#blogstatusBtn', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: '{{ route('blog.status') }}',
                data: {
                    id: id,
                    status: status,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    bloginfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
