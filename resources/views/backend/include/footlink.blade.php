 <!-- base:js -->
 <script src="{{asset('public/backend/vendors')}}/js/vendor.bundle.base.js"></script>
 <!-- endinject -->
 <!-- inject:js -->
 <script src="{{asset('public/backend/js')}}/off-canvas.js"></script>
 <script src="{{asset('public/backend/js')}}/hoverable-collapse.js"></script>
 <script src="{{asset('public/backend/js')}}/template.js"></script>
 <script src="{{asset('public/backend/js')}}/settings.js"></script>
 <script src="{{asset('public/backend/js')}}/todolist.js"></script>
 <!-- endinject -->
 <!-- plugin js for this page -->
 <script src="{{asset('public/backend/vendors')}}/typeahead.js/typeahead.bundle.min.js"></script>
 <script src="{{asset('public/backend/vendors')}}/select2/select2.min.js"></script>
 <!-- End plugin js for this page -->
 <!-- Custom js for this page-->
 <script src="{{asset('public/backend/js')}}/file-upload.js"></script>
 <script src="{{asset('public/backend/js')}}/typeahead.js"></script>
 <script src="{{asset('public/backend/js')}}/select2.js"></script>
 <!-- End custom js for this page-->

 {{-- data tables --}}
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>

{{-- //sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
