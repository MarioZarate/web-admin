//Para ocultar el session flash
$(document).ready(function(){
    var positiveMessage = $('.alert-success');
    var existsPossitiveMessage = positiveMessage.length;

    if (existsPossitiveMessage == 1) {
        positiveMessage.delay('5000').fadeOut('slow/5000/fast');
    }

    // Enviar formulario
    $("#submit-btn").click(function(){
        $("#admin-form").submit();
    });

    //Datepicker
      $('.date-picker').datepicker({
             format: 'dd-mm-yyyy',
             language: 'es',
             autoclose: true,
             orientation: "bottom",
             setDate : new Date(),
        });
});

//Cerrar modal preview imágenes
$("#modal-regresar").on('click', function() {
    $("#modal-image").hide();
});


/// ELIMINAR ELEMENTOS DESDE LISTADOS
$(document).ready(function(e) {

    $(".eliminar-elemento").on('click', function(e) {
        var elemento = $(this).closest('tr').data('id')
        $("#elemento-id").val(elemento)
    });

    $(".f-delete").on('click', function(e) {

        var elementoId = $("#elemento-id").val();
        var form = $("#form-delete-detail");
        var url  = form.attr('action').replace(':c_id', elementoId);
        var data = form.serialize();

        $.ajax({
            url : url,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (response) {
              if (response) {
                var trs = $('.table-rows');

                    $.each(trs, function(index, val) {
                        var value = $(this).data('id')
                        if (value === response) {
                            $("#close-modal-dl").click()
                            $(this).fadeOut('slow/400/fast');
                        }
                    });
                }
            }
        });
    });
});

$(function() {
    //f == formulario, entonces f-delete corresponde al formulario para eliminar un registro y f-password al de cambiar contraseña
    $('.f-delete').on('click', function() {
        $('#form-delete-detail').submit();
    });

    $('#f-password').click(function(e) {
        e.preventDefault();
        var token = $('input[name="_token"]').val();
        var formulario = $("#f-change-password");
        var form  = formulario.serialize();

        var request = $.post("/admin/change-password" , form);

        request.done(function(response) {
            var alert = $('.password-alert');
            alert.show();

            if (response.state) {
                alert.removeClass('alert-danger');
                alert.addClass('alert-success');
                alert.text(response.message)
                alert.delay('2000').fadeOut('slow/5000/fast');
                formulario[0].reset();
            } else {
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
                alert.text(response.message);
                formulario[0].reset();
            }
        });
    })
});

//Eliminar selección de imágenes
$(document).on('click', ".delete-flm" , function(e) {
    var delete_selector = $(this).closest('.imagen-array');
    delete_selector.find('input').val('');
    delete_selector.find('.title-image-flm').text('');
    delete_selector.find('.preview-flm').remove();
    $(this).remove();
});

$(document).on('click', '.icon-trash', function(e) {
    $(this).closest('.group-items').remove()
});

///LOADER
setTimeout(function() {
    $(".loader").css("display", 'none');
    $(".content").css("display", 'block');
},500);