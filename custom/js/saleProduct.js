var manageProductTable;

$(document).ready(function() {

    // top nav bar
    $('#navCompras').addClass('active');
    // manage product data table
    manageProductTable = $('#manageProductTable').DataTable({
        'ajax': 'php_action/fetchSaleProduct.php',
        'order': []
    });

    // add product modal btn clicked
    $("#addProductModalBtn").unbind('click').bind('click', function() {

        // // product form reset
        $("#submitProductForm")[0].reset();

        // remove text-error
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');

        $("#productImage").fileinput({
            overwriteInitial: true,
            maxFileSize: 2500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
        });

        // submit product form
        $("#submitProductForm").unbind('submit').bind('submit', function() {

            // Validar Campos de Formulario submitProductForm
            var productcod   = $("#productCod").val();
            var productcant    = $("#productCant").val();
            var productprice  = $("#productPrice").val();


            if(productcod == "") {
                $("#productCod").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#productCod').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#productCod").find('.text-danger').remove();
                // success out for form
                $("#productCod").closest('.form-group').addClass('has-success');
            }	// /else

            if(productcant == "") {
                $("#productCant").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#productCant').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#productCant").find('.text-danger').remove();
                // success out for form
                $("#productCant").closest('.form-group').addClass('has-success');
            }	// /else

            if(productprice == "") {
                $("#productPrice").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
                $('#productPrice').closest('.form-group').addClass('has-error');
            }	else {
                // remov error text field
                $("#productPrice").find('.text-danger').remove();
                // success out for form
                $("#productPrice").closest('.form-group').addClass('has-success');
            }

            if(productcod && productcant && productprice) {

                // submit loading button
                $("#createProductBtn").button('loading');

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
                            $("#createProductBtn").button('reset');

                            $("#submitProductForm")[0].reset();

                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

                            // shows a successful message after operation
                            $('#add-product-messages').html('<div class="alert alert-success">'+
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
                            manageProductTable.ajax.reload(null, true);

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