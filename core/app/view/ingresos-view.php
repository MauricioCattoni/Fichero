<section class="content">
<?php
$data = array();
$data["ingreso"]= IngresoData::getAll();
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ingresos
                        </h1>
                        <!--
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-home"></i> Inicio
                            </li>
                            <li class="active">
                                <i class="fa fa-th-list"></i> Planes
                            </li>
                        </ol>
                        -->
                    </div>
                </div>

                <!-- /.row -->
                <div class=col>
                <form role="form" method="post" action="./?action=updateingreso" enctype="multipart/form-data">
                
                            <div class="form-group ">
                                <label>Legajo</label>
                                <input type="number" name="legajo" class="form-control" placeholder="Escriba el legajo" required>
                            </div>
                           
                            <div class="form-group"> <!-- Pongo date para la fecha, time para la hora-->
                                <label>Fecha</label>
                                <input type="datetime-local" name="fecha" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Nuevo</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
              
                        <div class="box box-primary">
                            <div class="box-body">
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Legajo</th>
                                                <th>Nombre</th>
                                                <th>Entrada</th>
                                                <th>Salida</th>
                                                <th></th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
 <?php foreach($data["ingreso"] as $ingreso):?>
                                            <tr>
                                                <td><?=$ingreso->legajo;?></td>
                                                <td>
                                                <?php
                                                    if ($ingreso->name==null){
                                                        echo "no cargado";
                                                    }
                                                    else
                                                        echo $ingreso->name;
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                    if ($ingreso->entrada=="0000-00-00 00:00:00"){
                                                        echo "no cargada";
                                                    }
                                                    else
                                                        echo $ingreso->entrada;
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                    if ($ingreso->salida=="0000-00-00 00:00:00"){
                                                        echo "no cargada";
                                                    }
                                                    else
                                                        echo $ingreso->salida;
                                                ?>
                                                </td>
                                               
                                                
                                                <td style="width:100px;">
                                                <a href="./?action=delingreso&id=<?=$ingreso->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </section>