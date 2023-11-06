@extends('portal-layouts.app')
@section('title')
    {{auth()->user()->name}} Account
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">   {{auth()->user()->name}} Account</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Account
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Account Information</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="frm-change-account" action="{{url('admin/account')}}">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        <input type="text"  class="form-control" id="name" name="name" placeholder="Name *" value="{{auth()->user()->name}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="first_name">Name <span class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        <input type="email"  class="form-control" name="email" placeholder="Email" readonly value="{{auth()->user()->email}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                        <label for="">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        <input type="password"  class="form-control" id="current-password" name="current-password" placeholder="Current Password" autocomplete="off">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="current-password">Current Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        <input type="password"  class="form-control" id="password" name="password" placeholder="New Password" autocomplete="off">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="password">New Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        <input type="password"  class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" autocomplete="off">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="confirm-password">Confirm Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light float-right">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js_ends')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#frm-change-account").submit(function(e){
                e.preventDefault();
                var frm=$(this);
                var formData = frm.serialize();
                axios.post(frm.attr('action'),formData, {responseType:'json'}).then(function (response) {
                    if(response.data.code == 200) {
                        alert_success_reload('Success!',response.data.message);
                    }
                    else
                    {
                        alert_error('Error!',response.data.message,response.data.errors);
                    }
                }).catch(function (error) {
                    alert_error();
                });
            });
        });
    </script>
@endpush
