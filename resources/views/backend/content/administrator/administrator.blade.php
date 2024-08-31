@extends('backend.master')

@section('maincontent')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title m-0">Administrators / Administrators</h4>
                <a type="button" data-toggle="modal" data-target="#mainAdministrator" style="margin-top: -4px;color:white;" class="btn btn-info btn-sm"> + Create Brand Icon</a>
            </div>
            <p class="card-description" id="titlesetcenter">
              List Of Administrators
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="administratorinfo">
                <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

 {{-- create Administrators --}}
 <div class="modal fade" id="mainAdministrator">
    <div class="modal-dialog">
        <form name="form" id="AddAdministrator" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Administrator</h5>
                <a type="button" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                </a>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your name here" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@ayebazar.com" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Type Phone" required>
                    </div>

                    <label for="floatingInput">Select Role</label>
                    <select class="form-control mb-3" name="role" id="role">
                        <option value="">Select Role</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @empty

                        @endforelse
                    </select>

                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Confirm Password</label>
                        <input type="password" class="form-control" onkeyup="checkpassword()" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
                        <label for="floatingPassword" id="checkText" style="color: red;display:none">Password does not match !</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="AdministratorModel">
    <div class="modal-dialog">
        <form name="form" id="EditAdministrator" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Administrator</h5>
                <a type="button" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                </a>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Name</label>
                        <input type="text" class="form-control" name="name" id="editname" placeholder="Your name here" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control" name="email" id="editemail" placeholder="name@ayebazar.com" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Phone</label>
                        <input type="text" class="form-control" name="phone" id="editphone" placeholder="Type Phone" required>
                    </div>

                    <label for="floatingInput">Select Role</label>
                    <select class="form-control mb-3" name="role" id="editrole">
                        <option value="">Select Role</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @empty

                        @endforelse
                    </select>

                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="editpassword" placeholder="Password">
                    </div>
                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Confirm Password</label>
                        <input type="password" class="form-control" onkeyup="editcheckpassword()" name="confirmpassword" id="editconfirmpassword" placeholder="Confirm Password">
                        <label for="floatingPassword" id="editcheckText" style="color: red;display:none">Password does not match !</label>
                    </div>
                </div>
                <input type="hidden" name="administrator_id" id="administrator_id">

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    $(document).ready(function(){
        var token = $("input[name='_token']").val();

        var administratorinfo = $('#administratorinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.administrator.data') !!}',
            columns: [{
                    data: 'idinfo'
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'phone'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="admstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="admstatusBtn" data-id="' +
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

        $('#AddAdministrator').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('administrator.administrators.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#role').val('');
                    $('#password').val('');
                    $('#confirmpassword').val('');

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Success",
                    });
                    administratorinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit role
        $(document).on('click', '#editAdministrator', function() {
            let admid = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: 'administrators/' + admid + '/edit',

                success: function(data) {
                    $('#EditAdministrator').find('#editname').val(data.name);
                    $('#EditAdministrator').find('#editemail').val(data.email);
                    $('#EditAdministrator').find('#editphone').val(data.phone);
                    $('#EditAdministrator').find('#editrole').val(data.role_id);
                    $('#EditAdministrator').find('#administrator_id').val(data.id);
                    $('#EditAdministrator').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        $('#EditAdministrator').submit(function(e) {
            e.preventDefault();
            let admid = $('#administrator_id').val();

            $.ajax({
                type: 'POST',
                url: 'administrator/' + admid,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('#EditAdministrator').find('#editname').val('');
                    $('#EditAdministrator').find('#editemail').val('');
                    $('#EditAdministrator').find('#editphone').val('');
                    $('#EditAdministrator').find('#editrole').val('');
                    $('#EditAdministrator').find('#editpassword').val('');
                    $('#EditAdministrator').find('#editconfirmpassword').val('');
                    $('#EditAdministrator').find('#administrator_id').val('');

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Update successfully",
                        showConfirmButton: false,
                        timer: 1000
                    });

                    administratorinfo.ajax.reload();

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });


        $(document).on('click', '#admstatusBtn', function() {
            let admid = $(this).data('id');
            let admidStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'administrator/status',
                data: {
                    administrator_id: admid,
                    status: admidStatus,
                    '_token': token
                },

                success: function(data) {
                    Swal.fire({
                        title: "Status updated !",
                        icon: "success",
                    });
                    administratorinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });


    });

    function checkpassword(){
        var pass =$('#password').val();
        var confirmpass =$('#confirmpassword').val();
        if(pass==confirmpass){
            $('#checkText').css('display','none');
        }else{
            $('#checkText').css('display','inline');
            $('#confirmpassword').css('border','1px solid white');
        }
    }

    function editcheckpassword(){
        var pass =$('#editpassword').val();
        var confirmpass =$('#editconfirmpassword').val();
        if(pass==confirmpass){
            $('#editcheckText').css('display','none');
        }else{
            $('#editcheckText').css('display','inline');
            $('#editconfirmpassword').css('border','1px solid white');
        }
    }
</script>

@endsection
