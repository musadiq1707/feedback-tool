<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand">
                    <H2>Feedback Tool</H2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" navigation-header"><span>PERFORMANCE</span></li>
            <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                <a href="{{url('/admin')}}"><i class="feather icon-pie-chart"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class=" navigation-header"><span>Administrations</span></li>
            <li class="nav-item has-sub {{(request()->is('admin/user*')) ? 'open' : '' }}"><a href="javascript:;"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Users">Users</span></a>
                <ul class="menu-content" style="">
                    <li class="{{ (request()->is('admin/user')) ? 'active' : '' }}"><a href="{{url('/admin/user')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="All Users">All Users</span></a> </li>
                    <li class="{{ (request()->is('admin/user/active')) ? 'active' : '' }}"><a href="{{url('/admin/user/active')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Active Users">Active Users</span></a> </li>
                    <li class="{{ (request()->is('admin/user/inactive')) ? 'active' : '' }}"><a href="{{url('/admin/user/inactive')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Inactive Users">Inactive Users</span></a> </li>
                    <li class="{{ (request()->is('admin/user/add')) ? 'active' : '' }}"><a href="{{url('/admin/user/add')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="New User">New User</span></a> </li>
                </ul>
            </li>
            <li class="nav-item has-sub {{(request()->is('admin/category*')) ? 'open' : '' }}"><a href="javascript:;"><i class="feather icon-git-branch"></i><span class="menu-title" data-i18n="Categories">Categories</span></a>
                <ul class="menu-content" style="">
                    <li class="{{ (request()->is('admin/category')) ? 'active' : '' }}"><a href="{{url('/admin/category')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="All Categories">All Categories</span></a> </li>
                    <li class="{{ (request()->is('admin/category/active')) ? 'active' : '' }}"><a href="{{url('/admin/category/active')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Active Categories">Active Categories</span></a> </li>
                    <li class="{{ (request()->is('admin/category/inactive')) ? 'active' : '' }}"><a href="{{url('/admin/category/inactive')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Inactive Categories">Inactive Categories</span></a> </li>
                    <li class="{{ (request()->is('admin/category/add')) ? 'active' : '' }}"><a href="{{url('/admin/category/add')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="New Category">New Category</span></a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
