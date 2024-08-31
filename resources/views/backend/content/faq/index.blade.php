@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Faq
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
                <h2 class="mb-0">Faq List</h2>
                <a type="button" data-toggle="modal" data-target="#mainFaq" class="btn-sm btn btn-primary"
                    style="color:white;"> + Create Faq</a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card card-body rounded h-100 p-4">
            <div class="data-tables">
                <table class="table table-dark" id="faqinfo" width="100%" style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>FAQ</th>
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

    {{-- create payment icon --}}
    <div class="modal fade" id="mainFaq" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create New Faq</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddFaq" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
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
    <div class="modal fade" id="editmainFaq" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card card-body rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Faq</h5>
                    <a type="button" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                    </a>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditFaq" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Title" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                        </div>
                        <input type="text" name="faq_id" id="faq_id" hidden>

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

        var faqinfo = $('#faqinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.faq.data') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'description'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="faqstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="faqstatusBtn" data-id="' +
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

        //add faq
        $('#AddFaq').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.faqs.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Faq',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#title').val('');
                        $('#description').val('');

                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                        });
                        faqinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit faq
        $(document).on('click', '#editFaqBtn', function() {
            let faqId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'faqs/' + faqId + '/edit',

                success: function(data) {
                    $('#EditFaq').find('#title').val(data.title);
                    $('#EditFaq').find('#description').val(data.description);
                    $('#EditFaq').find('#faq_id').val(data.id);
                    $('#EditFaq').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update faq
        $('#EditFaq').submit(function(e) {
            e.preventDefault();
            let faqId = $('#faq_id').val();

            $.ajax({
                type: 'POST',
                url: 'faq/' + faqId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if(data == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Can not update Faq',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    }else{
                        $('#EditFaq').find('#title').val('');
                        $('#EditFaq').find('#description').val('');

                        Swal.fire({
                            title: "Faq update successfully !",
                            icon: "success",
                        });
                        faqinfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //delete faq
        $(document).on('click', '#deleteFaqBtn', function() {
            let faqId = $(this).data('id');

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
                    url: 'faqs/' + faqId,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        Swal.fire("Faq has been deleted!", {
                            icon: "success",
                        });
                        faqinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });


            }
            });

        });

        //status update
        $(document).on('click', '#faqstatusBtn', function() {
            let faqId = $(this).data('id');
            let faqStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'faq/status',
                data: {
                    faq_id: faqId,
                    status: faqStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    faqinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
