@extends('layouts.auth.app')
@section('title')
    Reset Password
@endsection
@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2 py-1">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Recover your password</h4>
                                </div>
                            </div>
                            <p class="px-2 mb-0">Please enter your email address, and we'll send you instructions on how to reset your password.</p>
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="frm_reset" method="POST" action="{{ route('password.email') }}">
                                        <div class="form-label-group">
                                            <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}" placeholder="Email">
                                            <label for="inputEmail">Email</label>
                                        </div>

                                        <div class="float-md-left d-block mb-1">
                                            <a href="{{url('/login')}}" class="btn btn-outline-primary btn-block px-75">Back to Login</a>
                                        </div>
                                        <div class="float-md-right d-block mb-1">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-block px-75"> Recover Password</button>
                                        </div>
                                    </form>
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
                        alert_success_redirect('Success',response.data.message,'{{url('login')}}');
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






