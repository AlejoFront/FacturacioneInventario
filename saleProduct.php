<?php header('Content-Type: text/html; charset=UTF-8');?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Inicio</a></li>
            <li class="active">Productos</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de compras Producto</div>
            </div> <!-- /panel-heading -->

            <div class="panel-body">

                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <?php

                    if ($_SESSION['rol'] == 1) {

                        echo '<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Abastecer producto </button>';
                    }else{
                        echo '<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#mensajeError"> <i class="glyphicon glyphicon-plus-sign"></i> Abastecer producto </button>';
                    }
                    ?>
                </div> <!-- /div-action -->

                <table class="table" id="manageProductTable">
                    <thead>
                    <tr>
                        <th>Cod Barras</th>
                        <th>Nombre del producto</th>
                        <th>Precio Compra</th>
                        <th>Cantidad Comprada</th>
                        <th>Marca</th>
                    </tr>
                    </thead>
                </table>
                <!-- /table -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/saleProduct.js?ver=1.0.10"></script>
<?php require_once 'includes/footer.php'; ?>

<!-- MODAL -->
<div id="mensajeError" data-backdrop="static" data-keyboard="false" class="modal fade">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cuidado</h4>
            </div>
            <div class="modal-body" id="">

                <div class="row" class="col-sm-6 col-md-4">
                    <center><img  src="assests/images/warning.png"  height="250"></center>
                    <p class="text-info text-center">SOLO LOS ADMINISTRADORES PUEDEN HACER ESTA ACCIÓN</p>

                </div>

            </div>

            <div class="modal-footer">
                <!--  	 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>-->
                <a><button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button></a>
            </div>
        </div>
    </div>
</div>
<!--End Modal -->

<!-- add product  Modal-->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="addProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitProductForm" action="php_action/createSaleProduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">

                    <div id="add-product-messages"></div>

                    <div class="form-group">
                        <label for="productName" class="col-sm-3 control-label">Codigo Producto a comprar</label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="productCod" placeholder="Codigo del producto" name="productCod" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productName" class="col-sm-3 control-label">Precio de Compra</label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="productPrice" placeholder="Precio de Compra del producto" name="productPrice" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productName" class="col-sm-3 control-label">Cantidad a comprar </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="productCant" placeholder="Cantidad a Comprar" name="productCant" autocomplete="off">
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Comprar</button>
                </div><!-- /modal-footer -->

            </form>

        </div>
        <div>
        </div>

