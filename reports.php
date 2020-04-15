<?php require_once 'includes/header.php'; ?>





    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="dashboard.php">Inicio</a></li>
                <li class="active">Reportes</li>
            </ol>


        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->

    <div class="row">

        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#clientes" aria-controls="home" role="tab" data-toggle="tab">Clientes</a></li>
            <li><a href="#ventas" aria-controls="home" role="tab" data-toggle="tab">Ventas/Consignaciones</a></li>
            <li><a href="#productos" aria-controls="home" role="tab" data-toggle="tab">Productos</a></li>
            <li><a href="#gastos" aria-controls="home" role="tab" data-toggle="tab">Gastos</a></li>
        </ul>

        <div class="tab-content">
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane active" id="clientes">
                </br>

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Reportes de Clientes</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes</p>
                                <a href="pdf/showClients.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes Activos</p>
                                <a href="pdf/showClientsActivos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes Inactivos</p>
                                <a href="pdf/showClientsInactivos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes ORO</p>
                                <a href="pdf/showClientsOro.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes Plata</p>
                                <a href="pdf/showClientsPlata.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Clientes Bronce</p>
                                <a href="pdf/showClientsBronce.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->

            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane" id="ventas">
                </br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Reportes de Ventas</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <div class="col-md-2">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Ventas al Día</p>
                                <a href="pdf/showDialySales.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-10">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Ventas por Fechas</p>
                                <form action="pdf/showDatesSales.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group"><label>Fecha Inicial:</label>
                                        <input type="date" class="form-control" name="fcha1A" id="fcha1A"  required/>
                                    </div>
                                    <div class="form-group"><label>Fecha Final:</label>
                                        <input type="date" class="form-control" name="fcha2B" id="fcha2B" required/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Ventas por Vendedor</p>
                                <form action="pdf/showSallerxSales.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group "><label>Vendedor:</label>
                                        <select class="form-control" name="vendedor" id="vendedor" required>
                                            <option selected disabled hidden>Selecciona un Vendedor</option>
                                            <?php
                                            $query = "SELECT id_user, nombre FROM user ";
                                            $resultado = $connect->query($query);
                                            while($row = $resultado->fetch_assoc() ){
                                                echo '<option value="'.$row['id_user'].'">'.$row['nombre'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Ventas por Cliente</p>
                                <form action="pdf/showClientxSales.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group"><label>Cliente:</label>
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <option selected disabled hidden>Selecciona un Cliente</option>
                                            <?php
                                            $query2 = "SELECT id_client, nombre_cte FROM clients ";
                                            $resultado2 = $connect->query($query2);
                                            while($row2 = $resultado2->fetch_assoc() ){
                                                echo '<option value="'.$row2['id_client'].'">'.$row2['nombre_cte'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Detallado de Ventas por Fechas</p>
                                <form action="pdf/showSalesDatesDetail.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group"><label>Fecha Inicial:</label>
                                        <input type="date" class="form-control" name="fcha1X" id="fcha1X"  required/>
                                    </div>
                                    <div class="form-group"><label>Fecha Final:</label>
                                        <input type="date" class="form-control" name="fcha2Z" id="fcha2Z" required/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!--panel body-->
                </div><!--panel-->
                <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Reportes de Consignaciones</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Consignaciones al Día</p>
                                <a href="pdf/showDepositDaily.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Consignaciones con saldo por Liquidar</p>
                                <a href="pdf/showDeposiBalance.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->
                        </div>

                        <div class="col-md-5">

                        </div>

                        <div class="col-md-12">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Consignaciones por Fechas</p>
                                <form action="pdf/showDeposiDates.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group"><label>Fecha Inicial:</label>
                                        <input type="date" class="form-control" name="fcha1C" id="fcha1C"  required/>
                                    </div>
                                    <div class="form-group"><label>Fecha Final:</label>
                                        <input type="date" class="form-control" name="fcha2D" id="fcha2D" required/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </br>
                        <div class="col-md-6">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Consignaciones por Vendedor</p>
                                <form action="pdf/showDeposixSaller.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group "><label>Vendedor:</label>
                                        <select class="form-control" name="vendedorC" id="vendedorC" required>
                                            <option selected disabled hidden>Selecciona un Vendedor</option>
                                            <?php
                                            $query = "SELECT id_user, nombre FROM user ";
                                            $resultado = $connect->query($query);
                                            while($row = $resultado->fetch_assoc() ){
                                                echo '<option value="'.$row['id_user'].'">'.$row['nombre'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </br>
                        </br>
                        <div class="col-md-6">
                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Consignaciones por Cliente</p>
                                <form action="pdf/showDeposixClient.php" method="POST" accept-charset="utf-8" class="form-inline" role="form">
                                    <div class="form-group"><label>Cliente:</label>
                                        <select class="form-control" name="clienteC" id="clienteC" required>
                                            <option selected disabled hidden>Selecciona un Cliente</option>
                                            <?php
                                            $query2 = "SELECT id_client, nombre_cte FROM clients ";
                                            $resultado2 = $connect->query($query2);
                                            while($row2 = $resultado2->fetch_assoc() ){
                                                echo '<option value="'.$row2['id_client'].'">'.$row2['nombre_cte'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Imprimir</button>
                                    </div>
                                </form>
                            </div>
                        </div>





                    </div><!--panel body-->
                </div><!--panel-->
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane" id="productos">
                </br>

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Reportes de Productos</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Productos</p>
                                <a href="pdf/showProducts.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Listado de Precios</p>
                                <a href="pdf/showPriceProduct.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-4">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Utilidad de Productos</p>
                                <?php

                                if ($_SESSION['rol'] == 1) {
                                    echo '<a href="pdf/showUtilityProduct.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>';
                                }else{
                                    echo '<button class="btn btn-danger button1" data-toggle="modal" data-target="#errorModal"> <i class="glyphicon glyphicon-print"></i> Imprimir </button>';
                                }
                                ?>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Aseo</p>
                                <a href="pdf/showProductAseo.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Electrodomesticos</p>
                                <a href="pdf/showProductElectrodomesticos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Frutas</p>
                                <a href="pdf/showProductFrutas.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Carnes</p>
                                <a href="pdf/showProductCarnes.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>


                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Verduras</p>
                                <a href="pdf/showProductVerduras.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Lacteos</p>
                                <a href="pdf/showProductLacteos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Embutidos</p>
                                <a href="pdf/showProductEmbutidos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Productos Dulces</p>
                                <a href="pdf/showProductDulces.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>
                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->

            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane" id="gastos">
                </br>

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Reportes de Gastos</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Reportes de Compras</p>
                                <a href="pdf/showProductComprados.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>

                        <div class="col-md-3">

                            <div class="div-action " style="padding-bottom:20px;">
                                <p>Imprimir Gastos Fijos</p>
                                <a href="pdf/showOtherGastos.php" title=""  target=”_blank” ><button class="btn btn-danger button1" data-toggle="modal" > <i class="glyphicon glyphicon-print"></i> Imprimir </button></a>
                            </div> <!-- /div-action -->

                        </div>



                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->

            </div>

        </div>

    </div>

    <!-- MODAL -->
    <div id="errorModal" data-backdrop="static" data-keyboard="false" class="modal fade">
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


<?php require_once 'includes/footer.php'; ?>