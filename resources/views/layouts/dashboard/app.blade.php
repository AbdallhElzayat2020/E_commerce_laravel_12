<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
@include('layouts.dashboard._head')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->

@include('layouts.dashboard._navbar')


<!-- //////////////////////////////////////-->
@include('layouts.dashboard._sidebar')

@yield('content')
<!-- //////////////////////////////////////-->
@include('layouts.dashboard._footer')
@include('layouts.dashboard._scripts')
</body>
</html>