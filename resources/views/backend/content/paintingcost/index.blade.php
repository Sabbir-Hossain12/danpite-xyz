@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Paintingcost
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
                <h2 class="mb-0">Painting Cost List</h2>
                <a type="button" data-toggle="modal" data-target="#mainPaintingcost" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Painting Cost</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="paintingcostinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Painting Type</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            
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

    {{-- create paintingcost icon --}}
    <div class="modal fade" id="mainPaintingcost" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Painting Cost</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddPaintingcost" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="title">Title 1</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title 1" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="title_2">Title 2</label>
                            <input type="text" class="form-control" name="title_2" id="title_2" placeholder="Title 2">
                        </div>
                        
                        
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Choose Painting Type</label>
                            <select name="paintingtype_id" id="paintingtype_id" required class="form-control">
                                <option value="" disabled selected>Choose</option>
                                @forelse ($paintingtypes as $paintingtype)
                                <option value="{{ $paintingtype->id }}">{{ $paintingtype->title }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Long Description</label>
                            <textarea name="longdescription" id="longdescription" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Price</label>
                            <input type="number" class="form-control" name="price" id="price"placeholder="Price" required>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image" id="image" type="file">
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

    {{-- edit paintingcost icon --}}
    <div class="modal fade" id="editmainPaintingcost" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Painting Cost</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditPaintingcost" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="title_2">Title 2</label>
                            <input type="text" class="form-control" name="title_2" id="title_2" placeholder="Title 2" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Choose Painting Type</label>
                            <select name="paintingtype_id" id="paintingtype_id" required class="form-control">
                                <option value="">Choose</option>
                                @forelse ($paintingtypes as $paintingtype)
                                <option value="{{ $paintingtype->id }}">{{ $paintingtype->title }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Long Description</label>
                            <textarea name="longdescription" id="longdescription" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Price</label>
                            <input type="number" class="form-control" name="price" id="price"placeholder="Price" required>
                        </div>
                        <div class="mt-4 mb-4">
                            <input class="form-control form-control-lg" name="image"
                                id="image" type="file">
                        </div>
                        <input type="text" name="paintingcost_id" id="paintingcost_id" hidden>

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

        var paintingcostinfo = $('#paintingcostinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.paintingcost.data') !!}',
            columns: [
                {
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
                    data: 'paintingtypes.title'
                },
                {
                    data: 'title'
                },
                {
                    data: 'description'
                },
                {
                    data:'price'
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

        //add paintingcost
        $('#AddPaintingcost').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.paintingcosts.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Painting cost',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#title').val('');
                        $('#title_2').val('');
                        $('#paintingtype_id').val('');
                        $('#description').val('');
                        $('#longdescription').val('');
                        $('#price').val('');
                        $('#image').val('');
                        
                        $('#AddPaintingcost')[0].reset();

                        $('#mainPaintingcost').modal('hide');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        paintingcostinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });


        //edit paintingcost
        $(document).on('click', '#editPaintingcostBtn', function() {
            let paintingcostId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'paintingcosts/' + paintingcostId + '/edit',

                success: function(data) {
                    $('#EditPaintingcost').find('#title').val(data.title);
                    $('#EditPaintingcost').find('#title_2').val(data.title_2);
                    $('#EditPaintingcost').find('#paintingtype_id').val(data.paintingtype_id);
                    $('#EditPaintingcost').find('#description').val(data.description);
                    $('#EditPaintingcost').find('#longdescription').val(data.longdescription);
                    $('#EditPaintingcost').find('#price').val(data.price);
                    $('#EditPaintingcost').find('#paintingcost_id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditPaintingcost').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update paintingcost
        $('#EditPaintingcost').submit(function(e) {
            e.preventDefault();
            let paintingcostId = $('#paintingcost_id').val();

            $.ajax({
                type: 'POST',
                url: 'paintingcost/' + paintingcostId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Painting Cost',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        $('#EditPaintingcost').find('#title').val('');
                        $('#EditPaintingcost').find('#paintingtype_id').val('');
                        $('#EditPaintingcost').find('#description').val('');
                        $('#EditPaintingcost').find('#longdescription').val('');
                        $('#EditPaintingcost').find('#price').val('');
                        $('#EditPaintingcost').find('#image').val('');
                        $('#previmg').html('');

                        Swal.fire({
                            title: "Paintingcost update successfully !",
                            icon: "success",
                        });
                        paintingcostinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete paintingcost
        $(document).on('click', '#deletePaintingcostBtn', function() {
            let paintingcostId = $(this).data('id');

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
                    url: 'paintingcosts/' + paintingcostId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Paintingcost has been deleted!", {
                            icon: "success",
                        });
                        paintingcostinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#paintingcoststatusBtn', function() {
            let paintingcostId = $(this).data('id');
            let paintingcostStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'paintingcost/status',
                data: {
                    paintingcost_id: paintingcostId,
                    status: paintingcostStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    paintingcostinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });





    });
</script>

@endsection

