@extends('backend.master')

@section('maincontent')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Administrators / Roles</h4>
            <p class="card-description" id="titlesetcenter">
              List Of Roles
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="roleinfo">
                <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Role Name</th>
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

<div class="modal fade" id="roleModel">
    <div class="modal-dialog">
        <form name="form" id="EditRole" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <a type="button" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('public/cross.png') }}" alt="" style="width: 16px;">
                </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rolename">Role Name</label>
                        <input type="text" class="form-control" name="role_name" id="role_name">
                    </div>
                </div>
                <input type="hidden" name="role_id" id="role_id">

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
        var roleinfo = $('#roleinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.role.data') !!}',
            columns: [{
                    data: 'idinfo'
                },
                {
                    data: 'role_name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });


        //edit role
        $(document).on('click', '#editRole', function() {
            let roleid = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: 'roles/' + roleid + '/edit',

                success: function(data) {
                    $('#EditRole').find('#role_name').val(data.role_name);
                    $('#EditRole').find('#role_id').val(data.id);
                    $('#EditRole').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        $('#EditRole').submit(function(e) {
            e.preventDefault();
            let roleid = $('#role_id').val();

            $.ajax({
                type: 'POST',
                url: 'role/' + roleid,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('#EditRole').find('#role_name').val('');
                    $('#EditRole').find('#role_id').val('');

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Role update successfully",
                        showConfirmButton: false,
                        timer: 1000
                    });

                    roleinfo.ajax.reload();

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

    });
</script>

@endsection
