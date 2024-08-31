<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{env('PROD_URL')}}/public/logo.jpg">
    @yield('meta')
    @yield('subcss')
    @include('frontend.include.headlink')

</head>

<body>

    <!--==========================
    Header
  ============================-->
    @include('frontend.include.header')
    <!-- #header -->

        @yield('maincontent')

    <!-- #footer start-->
    @include('frontend.include.footer')
    <!-- #footer -->

    <!-- #foot links -->
    @yield('subjs')
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
    @include('frontend.include.footlink')
   


</body>

</html>
