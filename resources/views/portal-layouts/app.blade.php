<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
@include('portal-layouts.head')
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@stack('body_start')
@if(auth()->user()->role=='Admin')
    @include('portal-layouts.sidebar.admin')
@endif
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @if(auth()->user()->role=='Admin')
        @include('portal-layouts.top_bar')
    @endif
    @yield('content')
</div>
@include('portal-layouts.scripts')
@stack('body_end')
</body>
</html>
