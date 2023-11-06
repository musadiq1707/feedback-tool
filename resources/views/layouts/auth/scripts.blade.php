@stack('js_start')
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
</script>
@stack('js_ends')
