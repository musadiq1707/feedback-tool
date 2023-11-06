<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}} All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<div id="loader-ajax" class="loading-ajax" style="z-index: 10000;"></div>
@stack('js_start')
<script src="{{asset('app-assets/js/axios.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
<script src="{{asset('app-assets/js/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/custom.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $('#loader-ajax').hide();
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.interceptors.request.use((config) => {
        $('#loader-ajax').show();
        return config;
    }, (error) => {
        $('#loader-ajax').hide();
        return Promise.reject(error);
    });
    axios.interceptors.response.use((response) => {
        $('#loader-ajax').hide();
        return response;
    }, (error) => {
        $('#loader-ajax').hide();
        return Promise.reject(error);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('.tooltip-custom').each(function () {
            var value = $(this).data("value");
            $(this).replaceWith('<span class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="'+value+'"></span>');
        });
    });
</script>
@stack('js_ends')
