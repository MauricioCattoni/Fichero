<section class="content">
<?php
$data["posts"]=UserData::getAll();
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuarios
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Usuarios
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <a href="./?view=newuser" class="btn btn-default">Agregar</a><br><br>
                        <div class="box box-primary">
                            <div class="box-body">
                                    <table class="table datatable table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Legajo</th>
                                                <th>Tipo de usuario</th>
                                                <th>Entradas</th>
                                                <th>Salidas</th>
                                                <th>Horas trabajadas</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data["posts"] as $post):?>
                                            <tr>
                                                <td><?=$post->name." ".$post->lastname;?></td>
                                                <td><?=$post->legajo;?></td>
                                                <td><?php 
                                                switch ($post->kind_id) {
                                                    case 1: echo "Adminsitrador"; break;
                                                    case 2: echo "Sub Adminsitrador"; break;
                                                    case 3: echo "Cliente/Empresa"; break;
                                                    
                                                    default:
                                                        # code...
                                                        break;
                                                }
                                                     ?></td>
                                                <?php 
                                                $ingresos = IngresoData::getAllByLegajo($post->legajo);
                                                $entradas = 0;
                                                $salidas = 0;
                                                $tiempo = 0;
                                                if (count($ingresos)>0){
                                                    foreach ($ingresos as $i){
                                                        if ($i->entrada!="0000-00-00 00:00:00"){
                                                            $entradas=$entradas+1;
                                                        }
                                                        if ($i->salida!="0000-00-00 00:00:00"){
                                                            $salidas=$salidas+1;
                                                            $horas = (strtotime($i->salida)-strtotime($i->entrada))/(60*60);
                                                            $horas = abs($horas); 
                                                            $horas = floor($horas);
                                                           // $diff = date("H:i:s", strtotime($i->salida)-strtotime($i->entrada));
                                                            $tiempo = $tiempo+ $horas;
                                                        }
                                                    }
                                                }
                        
                                                ?>
                                                <td><?=$entradas;?></td>
                                                <td><?=$salidas;?></td>
                                                <td><?=$tiempo;?></td>
                                                <td style="width:70px;">
                                                <a href="./?view=edituser&id=<?=$post->id;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="./?action=deluser&id=<?=$post->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
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