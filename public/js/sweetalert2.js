$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
});

$('body').on('click', '.modal-show', function(e){
    e.preventDefault();

    let me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').html(title);
    $('#modal-btn-save').removeClass('hide').text(me.hasClass('edit') ? 'Update' : 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response)
        {
            $('#modal').modal('show');
            $('#modal-body').html(response);
        },
        error : function(error)
        {
            $('#modal').modal('hide');
            swal({
                type : 'error',
                title : 'Error 401',
                text : 'Unauthorized action'
            });
        }
    });
});

$('#modal-btn-save').click(function(e){
    e.preventDefault();

    let form = $('#modal-body form'),
        url = form.attr('action'),
        method = form.attr('method');

    form.find('.form-control-feedback').remove();
    form.find('.form-group').removeClass('has-danger');

    $.ajax({
        url : url,
        method : method,
        data : form.serialize(),
        success : function(response){
            console.log('response : '+response);
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Success',
                text : 'Saved'
            });
        },
        error : function(e){
            console.log('error : '+e);
            var response = e.responseJSON;
            // console.log(response);
            if($.isEmptyObject(response) == false)
            {
                $.each(response.errors, function(key, value) {
                    $('#' + key).closest('.form-control').addClass('is-invalid');
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-danger')
                        .append('<div class="form-control-feedback">'+ value +'</div>');
                });
            }
        }
    });
});

$('body').on('click', '.btn-show', function(e){
    e.preventDefault();

    let me = $(this),
        title = me.attr('title'),
        url = me.attr('href');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        method: 'get',
        dataType: 'html',
        success: function(response){
            $('#modal').modal('show');
            $('#modal-body').html(response);
        },
        error: function(error){
            swal({
                type : 'error',
                title : 'Error 400',
                text : 'Failed to get data'
            });
        }
    });
});

$('body').on('click', '.btn-delete', function(e){
    e.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf_token"]').attr('content');

        Swal.fire({
            title : 'Are you sure?',
            type : 'warning',
            showCancelButton : true,
            confirmButtonColor : '#3085d6',
            cancelButtonColor : '#d33',
            confirmButtonText : 'Yes, delete it'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url : url,
                    type : 'post',
                    data : {
                        '_method': 'DELETE',
                        '_token' : csrf_token
                    },
                    success : function(r){
                        $('#datatable').DataTable().ajax.reload();
                        swal({
                            type : 'success',
                            title : 'Success',
                            text : 'Deleted'
                        });
                    },
                    error : function(xhr, status, error){
                        var err = eval("(" + xhr.responseText + ")");
                        swal({
                            type : 'error',
                            title : 'Failed',
                            text : err.Message
                        });
                    }
                });
            }
        });
});