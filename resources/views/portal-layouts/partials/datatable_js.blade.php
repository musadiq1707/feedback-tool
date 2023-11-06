<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.extend( true, $.fn.dataTable.defaults, {
            initComplete : function() {
                var input = $('.dataTables_filter input').unbind(),
                    self = this.api(),
                    $searchButton = $('<button class="btn btn-primary btn-sm" style="margin: 0 5px;">')
                        .html('<i class="feather icon-search"></i> search')
                        .click(function() {
                            self.search(input.val()).draw();
                        }),
                    $clearButton = $('<button class="btn btn-dark btn-sm">')
                        .text('clear')
                        .click(function() {
                            input.val('');
                            $searchButton.click();
                        })
                $('.dataTables_filter').append($searchButton, $clearButton);
            }
        });
    });
    var dt_options={
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "order": [[ 1, "desc" ]],
        "ajax":{
            "url": "",
            "dataType": "json",
            "type": "POST",
            "data":{ },
        },
        "columns":[]
    };
</script>

