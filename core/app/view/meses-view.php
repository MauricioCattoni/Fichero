<section class="content">
<?php
$meses = array(
    "enero" => 0,
    "febrero" => 0,
    "marzo" => 0,
    "abril" => 0,
    "mayo"  => 0,
    "junio" => 0,
    "julio" => 0,
    "agosto" => 0,
    "septiembre" => 0,
    "octubre" => 0,
    "noviembre" => 0,
    "diciembre" => 0,
);

$ingresos=IngresoData::getAll();
if (count($ingresos)>0){
    foreach ($ingresos as $i){
        $fechaEntera = strtotime($i->entrada);
        $mes = date("m", $fechaEntera);
        switch ($mes) {
            case 1:
                $meses["enero"]++;
                break;
            case 2:
                $meses["febrero"]++;
                break;
            case 3:
                $meses["marzo"]++;
                break;
            case 4:
                $meses["abril"]++;
                break;
            case 5:
                $meses["mayo"]++;
                break;
            case 6:
                $meses["junio"]++;
                break;
            case 7:
                $meses["julio"]++;
                break;
            case 8:
                $meses["agosto"]++;
                break;
            case 9:
                $meses["septiembre"]++;
                break;
            case 10:
                $meses["octubre"]++;
                break;
            case 11:
                $meses["noviembre"]++;
                break;
            case 12:
                $meses["diciembre"]++;
                break;
        }
        
    }


}

?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Meses
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
             
                <br>
                <div class="row">
                    <div class="col-lg-12">
              
                        <div class="box box-primary">
                            <div class="box-body">
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mes</th>
                                                <th>Cantidad de fichadas</th>
                                             
                                           
                                            </tr>
                                        </thead>

                                        <tbody>
     
                                        <?php foreach ($meses as $m => $cant) { ?>
                                            <tr>
                                                <td><?=$m;?></td>
                                                <td><?=$cant;?></td>
                                            </tr>
                                        <?php } ?>  
                                        </tbody>
                                    </table>
                                    </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </section>