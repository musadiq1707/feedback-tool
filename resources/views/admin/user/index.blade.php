@extends('portal-layouts.app')
@section('title')
    {{$type}} Users
@endsection
@push('head_end')
    @include('portal-layouts.partials.datatable_css')
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Users </h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                                <li class="breadcrumb-item active"> {{$type}} Users </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{$type}} Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <a href="{{url('admin/user/add')}}" class="btn btn-sm btn-primary text-white waves-effect waves-light float-right"><i class="feather icon-plus"></i> New User</a>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="list_data">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
    @include('portal-layouts.partials.datatable_js')
    <script type="text/javascript">
        $(document).ready(function(){
            dt_options.ajax.url='{{ url('admin/user/list') }}';
            dt_options.ajax.data.type='{{$type}}';
            dt_options.columns.push({"data": "id" });
            dt_options.columns.push({"data": "name" });
            dt_options.columns.push({"data": "email" });
            dt_options.columns.push({"data": "status" });
            dt_options.columns.push({"data": "created_date" });
            dt_options.columns.push({"data": "options" });
            $('#list_data').DataTable(dt_options);
        });

        function delete_record(id)
        {
            var option = {};
            option.text='Are you sure want to delete this User?'
            alert_confirmation(option).then((result) => {
                if (result.value)
                {
                    var config = {
                        data: {},
                        responseType: 'json',
                        method:'delete',
                        url : '{{url('admin/user/delete')}}/'+id
                    };
                    axios(config).then(function (response) {
                        if(response.data.code == 200)
                        {
                            alert_success_reload('Success!',response.data.message);
                        }
                        else
                        {
                            alert_error('Error!',response.data.message,response.data.errors);
                        }
                    }).catch(function (error) {
                        alert_error();
                    });
                }
            });
        }
    </script>
@endpush
