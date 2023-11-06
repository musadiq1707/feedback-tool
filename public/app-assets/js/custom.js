
function alert_error(title="Error!",message='Something went wrong.',errors={})
{
    if(Object.keys(errors).length>0)
    {
        let html = '';
        $.each(errors, function( key, value ) {
            html += '<div class="alert alert-danger">'+value+'</div>';
        });
        html += '';

        Swal.fire({
            title: title,
            html:html
        });
    }
    else
    {
        Swal.fire(
            title,
            message,
            'error'
        );
    }


  return(false);
}
function alert_success(title="Success!",message='')
{
    Swal.fire(
        title,
        message,
        'success'
    );
}
function alert_info(title="Info!",message='')
{
    Swal.fire(
        title,
        message,
        'info'
    );
}
function alert_success_redirect(title="Success!",message='',redirect='')
{
    Swal.fire(
        title,
        message,
        'success'
    ).then((value) => {
        top.location.href=redirect;
    });

}
function alert_success_reload(title="Success!",message='',redirect='')
{
    Swal.fire(
        title,
        message,
        'success'
    ).then((value) => {
        window.location.reload(true);
    });
}

function alert_confirmation(obj) {

    var option = {
        title: 'Delete',
        text: 'Are you sure want to delete this?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    };
    if(obj.hasOwnProperty('title'))
    {
        option.title=obj.title;
    }
    if(obj.hasOwnProperty('text'))
    {
        option.text=obj.text;
    }
    if(obj.hasOwnProperty('icon'))
    {
        option.icon=obj.icon;
    }
    if(obj.hasOwnProperty('showCancelButton'))
    {
        option.showCancelButton=obj.showCancelButton;
    }
    if(obj.hasOwnProperty('confirmButtonText'))
    {
        option.confirmButtonText=obj.confirmButtonText;
    }
    if(obj.hasOwnProperty('confirmButtonColor'))
    {
        option.confirmButtonColor=obj.confirmButtonColor;
    }
    if(obj.hasOwnProperty('cancelButtonColor'))
    {
        option.cancelButtonColor=obj.cancelButtonColor;
    }

    return Swal.fire(option);

}

function alert_notice(message='Something Wrong!')
{
    Swal.fire(message);
}
