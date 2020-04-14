var manageClientTable;

$(document).ready(function() {

    // top nav bar
    $('#navProvider').addClass('active');
    // manage client data table
    manageClientTable = $('#manageClientTable').DataTable({
        'ajax': 'php_action/fetchProvider.php',
        'order': []
    });

    // add client modal btn clicked
    $("#addClientModalBtn").unbind('click').bind('click', function() {

        // // client form reset
        $("#submitClientForm")[0].reset();

        // remove text-error
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');

        // submit client form
        $("#submitClientForm").unbind('submit').bind('submit', function() {

            // Validar Campos de Formulario submitClientForm
            var ProviderCed	 = $("#providerCod").val();
            var NameProvider   = $("#providerName").val();
            var AddresProvider = $("#providerAddres").val();
            var EmailProvider  = $("#providerEmail").val();
            var TelProvider    = $("#providerTelefono").val();
            var CatProvider   = $("#providerCategory").val();

            if (ProviderCed == ""){
                $("#providerCod").after('<p class="text-danger">Este campo es obligatorio</p>');
                $("#providerCod").closest('.form-group').addClass('has-error');
            }	else {
                $("#providerCod").find('.text-danger').remove();
                // success out for form
                $("#providerCod").closest('.form-group').addClass('has-success');
            }


            if(NameProvider == "") {
                $("#providerName").after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#providerName').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#providerName").find('.text-danger').remove();
                // success out for form
                $("#providerName").closest('.form-group').addClass('has-success');
            }	// /else

            if(AddresProvider == "") {
                $("#providerAddres").after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#providerAddres').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#providerAddres").find('.text-danger').remove();
                // success out for form
                $("#providerAddres").closest('.form-group').addClass('has-success');
            }	// /else

            if(EmailProvider == "") {
                $("#providerEmail").after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#providerEmail').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#providerEmail").find('.text-danger').remove();
                // success out for form
                $("#providerEmail").closest('.form-group').addClass('has-success');
            }	// /else

            if(TelProvider == "") {
                $("#providerTelefono").after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#providerTelefono').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#providerTelefono").find('.text-danger').remove();
                // success out for form
                $("#providerTelefono").closest('.form-group').addClass('has-success');
            }	// /else

            if(CatProvider == "") {
                $("#providerCategory").after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#providerCategory').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#providerCategory").find('.text-danger').remove();
                // success out for form
                $("#providerCategory").closest('.form-group').addClass('has-success');
            }	// /else


            if(ProviderCed && NameProvider && AddresProvider && EmailProvider  && TelProvider && CatProvider) {

                // submit loading button
                $("#createClientBtn").button('loading');

                var form = $(this);
                var formData = new FormData(this);

                $.ajax({
                    url : form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {

                        if(response.success == true) {
                            // submit loading button
                            $("#createClientBtn").button('reset');

                            $("#submitClientForm")[0].reset();

                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

                            // shows a successful message after operation
                            $('#add-client-messages').html('<div class="alert alert-success">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert

                            // reload the manage student table
                            manageClientTable.ajax.reload(null, true);

                            // remove text-error
                            $(".text-danger").remove();
                            // remove from-group error
                            $(".form-group").removeClass('has-error').removeClass('has-success');

                        } // /if response.success

                    } // /success function}

                }); // /ajax function

            }	 // /if validation is ok

            return false;
        }); // /submit product form

    }); // /add product modal btn clicked

});// document.ready fucntion

//Editar Client
function editClient(providerId = null) {

    if (providerId) {

        $.ajax({
            url: 'php_action/fetchSelectedProvider.php',
            type: 'post',
            data: {providerId: providerId},
            dataType: 'json',
            success:function(response) {
                // alert(response.product_image);
                // modal spinner
                $('.div-loading').addClass('div-hide');
                // modal div
                $('.div-result').removeClass('div-hide');


                // Client id
                $(".editClientFooter").append('<input type="hidden" name="providerId" id="clientId" value="'+response.id_provider+'" />');

                //Codigo
                $("#editClientID").val(response.id_provider);
                // Nombre
                $("#editClientName").val(response.nombre);
                //Direccion
                $("#editClientAddress").val(response.direccion);
                //Email
                $("#editClientEmail").val(response.email);
                //Telefono
                $("#editClientTelefono").val(response.telefono);
                //Categoria
                $("#editClientStatus").val(response.categoria);

                // Actualizar datos de Informacion de Clientes con funcion Ajax
                $("#editClientForm").unbind('submit').bind('submit', function() {

                    // form validation
                    var name   = $("#editClientName").val();
                    var addres = $("#editClientAddress").val();
                    var email  = $("#editClientEmail").val();
                    var tel    = $("#editClientTelefono").val();
                    var cate   = $("#editClientStatus").val();

                    if(name == "") {
                        $("#editClientName").after('<p class="text-danger">Este campo es obligatorio</p>');
                        $('#editClientName').closest('.form-group').addClass('has-error');
                    }	else {
                        // remov error text field
                        $("#editClientName").find('.text-danger').remove();
                        // success out for form
                        $("#editClientName").closest('.form-group').addClass('has-success');
                    }	// /else

                    if(addres == "") {
                        $("#editClientAddress").after('<p class="text-danger">Este campo es obligatorio</p>');
                        $('#editClientAddress').closest('.form-group').addClass('has-error');
                    }	else {
                        // remov error text field
                        $("#editClientAddress").find('.text-danger').remove();
                        // success out for form
                        $("#editClientAddress").closest('.form-group').addClass('has-success');
                    }	// /else

                    if(email == "") {
                        $("#editClientEmail").after('<p class="text-danger">Este campo es obligatorio</p>');
                        $('#editClientEmail').closest('.form-group').addClass('has-error');
                    }	else {
                        // remov error text field
                        $("#editClientEmail").find('.text-danger').remove();
                        // success out for form
                        $("#editClientEmail").closest('.form-group').addClass('has-success');
                    }	// /else

                    if(tel == "") {
                        $("#editClientTelefono").after('<p class="text-danger">Este campo es obligatorio</p>');
                        $('#editClientTelefono').closest('.form-group').addClass('has-error');
                    }	else {
                        // remov error text field
                        $("#editClientTelefono").find('.text-danger').remove();
                        // success out for form
                        $("#editClientTelefono").closest('.form-group').addClass('has-success');
                    }	// /else

                    if(cate == "") {
                        $("#editClientStatus").after('<p class="text-danger">Este campo es obligatorio</p>');
                        $('#editClientStatus').closest('.form-group').addClass('has-error');
                    }	else {
                        // remov error text field
                        $("#editClientStatus").find('.text-danger').remove();
                        // success out for form
                        $("#editClientStatus").closest('.form-group').addClass('has-success');
                    }	// /else


                    if(name && addres && email && tel && cate) {

                        // submit loading button
                        $("#editClientBtn").button('loading');

                        var form = $(this);
                        var formData = new FormData(this);

                        $.ajax({
                            url : form.attr('action'),
                            type: form.attr('method'),
                            data: formData,
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(response) {
                                console.log(response);
                                if(response.success == true) {
                                    // submit loading button
                                    $("#editClientBtn").button('reset');
                                    $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

                                    // shows a successful message after operation
                                    $('#edit-client-messages').html('<div class="alert alert-success">'+
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                        '</div>');

                                    // remove the mesages
                                    $(".alert-success").delay(500).show(10, function() {
                                        $(this).delay(3000).hide(10, function() {
                                            $(this).remove();
                                        });
                                    }); // /.alert

                                    // reload the manage client table
                                    manageClientTable.ajax.reload(null, true);

                                    // remove text-error
                                    $(".text-danger").remove();
                                    // remove from-group error
                                    $(".form-group").removeClass('has-error').removeClass('has-success');


                                }  // /if response.success

                            } // /success function

                        }); // /ajax function

                    }	 // /if validation is ok

                    return false;
                }); // update the clientes data function

            } // /success function

        })// /ajax to fetch Client

    }else{
        alert("ERROR")
    }

}//Edit Client


//Eliminar Cliente
function removeProvider(providerId = null) {

    if(providerId) {
        // remove cliente button clicked
        $("#removeClientBtn").unbind('click').bind('click', function() {
            // loading remove button
            $("#removeClientBtn").button('loading');
            $.ajax({
                url: 'php_action/removeProvider.php',
                type: 'post',
                data: {providerId: providerId},
                dataType: 'json',
                success:function(response) {
                    // loading remove button
                    $("#removeClientBtn").button('reset');
                    if(response.success == true) {
                        // remove cliente modal
                        $("#removeClientModal").modal('hide');

                        // update the cliente table
                        manageClientTable.ajax.reload(null, false);

                        // remove success messages
                        $(".remove-messages").html('<div class="alert alert-success">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                            '</div>');

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert
                    } else {

                        // remove success messages
                        $(".removeClientMessages").html('<div class="alert alert-success">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                            '</div>');

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert

                    } // /error
                } // /success function
            }); // /ajax fucntion to remove the product
            return false;
        }); // /remove product btn clicked
    } // /if productid
} // /remove cliente function