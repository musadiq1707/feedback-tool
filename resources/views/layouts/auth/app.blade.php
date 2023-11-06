<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.auth.head')
<body class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
@stack('body_start')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.auth.scripts')
@stack('body_end')
</body>
</html>



