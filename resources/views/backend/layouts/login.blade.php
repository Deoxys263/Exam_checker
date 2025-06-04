<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title',env('APP_NAME'))</title>
    @include('backend.includes.login_head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    {{-- @include('backend.includes.leftnav') --}}
    <!--  Main wrapper -->
    <div class="">
        <!--  Header Start -->
        {{-- @include('backend.includes.topnav') --}}

      <!--  Header End -->
        <div class="body-wrapper-inner d-flex justify-content-center">
        <div class="container-fluid mx-auto pt-5 mt-5" style="max-width: 600px;">
            @yield('content')

            </div>
      </div>
    </div>
  </div>
  @include('backend.includes.footer')
  @yield('scripts')
</body>

</html>
