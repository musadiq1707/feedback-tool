@extends('layouts.auth.app')
@section('title')
    Password Reset
@endsection
@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Reset Password</h4>
                                </div>
                            </div>
                            <p class="px-2"> please reset to your password.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form action="{{ route('password.update') }}" method="post" id="frm_reset">
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="email"  required>
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
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

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="password_confirmation">Confirm Password</label>
                                        </fieldset>

                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <button type="submit" class="btn btn-primary float-right btn-inline">Reset Password</button>
                                    </form>
                                </div>
                            </div>
                            <div class="login-footer">
                                <div class="divider">
                                    <div class="divider-text">Reset Password</div>
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
            $("#frm_reset").submit(function(e){
                e.preventDefault();
                var frm=$(this);
                var formData = frm.serialize();
                axios.post(frm.attr('action'),formData, {responseType:'json'}).then(function (response) {
                    if(response.data.code == 200) {
                        alert_success_redirect('Success',response.data.message,'{{url('login')}}')
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












