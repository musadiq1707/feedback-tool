@extends('portal-layouts.app')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Category</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/admin/category')}}">Categories</a></li>
                                <li class="breadcrumb-item active">  Edit Category </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form class="form form-horizontal" id="frm-edit" action="{{ url('admin/category/update/'.$category->id) }}">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Category Information</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group position-relative has-icon-left">
                                                    <input type="text"  class="form-control" value="{{ $category->name }}" id="name" name="name" placeholder="Name *" >
                                                    <div class="form-control-position">
                                                        <i class="feather icon-git-branch"></i>
                                                    </div>
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" @if($category->enabled==1) checked="checked" @endif value="1" name="enabled" id="customRadio1" checked>
                                                                    <label class="custom-control-label" for="customRadio1">Active</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" @if($category->enabled==0) checked="checked" @endif value="0" name="enabled" id="customRadio2">
                                                                    <label class="custom-control-label" for="customRadio2">Inactive</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Update Category</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </form>
        </div>
    </div>
@endsection

@push('js_ends')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#frm-edit").submit(function(e) {
                e.preventDefault();
                var frm = $(this);
                var formData = new FormData(this);
                formData.append('_method', 'PATCH');
                var config = {
                    data: formData,
                    responseType: 'json',
                    method:'post',
                    url : frm.attr('action')
                };
                axios(config).then(function (response) {
                    if(response.data.code == 200) {
                        alert_success_reload('Success!',response.data.message);
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
