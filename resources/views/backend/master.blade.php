<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.include.headlink')
    @yield('css')
    <style>
        #titlesetcenter{
            text-align: center;
            font-size: 25px;
            text-transform: uppercase;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('backend.include.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!--- SIDE BAR AND COLOR SETTINGS --->
        @include('backend.include.sidebar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('maincontent')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer -->
        @include('backend.include.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('backend.include.footlink')
  @yield('js')

  <script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

</body>

</html>
