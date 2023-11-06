@extends('layouts.auth.app')
@section('title')
    Login
@endsection
@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-12 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Login</h4>
                                </div>
                            </div>
                            <p class="px-2">Welcome back, please login to your account.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form action="{{route('login')}}" method="post" id="frm_login">
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="email">Email</label>
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input type="password" class="form-control" name="password" id="user-password" placeholder="Password" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="user-password">Password</label>
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="remember">
                                                        <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                        <span class="">Remember me</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a></div>
                                        </div>
                                        @csrf
                                        <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="login-footer">
                                <div class="divider">
                                    <div class="divider-text">Login</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js_ends')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#frm_login").submit(function(e){
                e.preventDefault();
                var frm=$(this);
                var formData = frm.serialize();
                axios.post(frm.attr('action'),formData, {responseType:'json'}).then(function (response) {
                    if (response.status === 200 && response.data.code === 2) {
                        if (response.data.url === '/admin') {
                            top.location = response.data.url;
                        } else {
                            top.location = response.data.url;
                        }
                    } else {
                        alert_error('Error!',response.data.message,response.data.errors);
                    }
                }).catch(function (error) {
                    alert_error();
                });
            });
        });
    </script>
@endpush
