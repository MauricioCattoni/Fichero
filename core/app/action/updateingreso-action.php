<?php
/**
* @author Lokisho27
* @brief Agregar un usuario
**/

$ingresos = IngresoData::getAllByLegajo($_POST["legajo"]);
if (count($ingresos)>0){
    $busqueda=0;
    foreach ($ingresos as $i){ //Recorro pero en realidad, siempre va a ser uno el q cumpla una d las 2 condiciones
        if ($i->entrada=="0000-00-00 00:00:00"){
            $i->entrada=$_POST["fecha"];
            $i->update();
            $busqueda=1;
        }
        elseif ($i->salida=="0000-00-00 00:00:00"){
            $i->salida=$_POST["fecha"];
            $i->update();
            $busqueda=1;
        }
    }
    if ($busqueda==0){
        $p = new IngresoData();
        $p->legajo= $_POST["legajo"];
        $p->entrada = $_POST["fecha"];
        $p->add();
    }


}
else
{
    $p = new IngresoData();
    $p->legajo= $_POST["legajo"];
    $p->entrada = $_POST["fecha"];
    $p->add();
   
}
Core::redir("./?view=ingresos"); 	
?>


<?php
/*
$ingresos = IngresoData::getAll();
if (count($ingresos)>0){
    $busqueda=0;
    foreach ($ingresos as $i){
        if ($i->legajo==$_POST["legajo"]  ){
            $busqueda=$i->id;
        }
    }
    if ($busqueda!=0){
        $encontrado  = IngresoData::getById($busqueda);
        if ($encontrado->entrada!="0000-00-00 00:00:00"){
            $encontrado->salida=$_POST["fecha"];
        }
        else
            $encontrado->entrada=$_POST["fecha"];
        $encontrado->update();
    }
    else
    {
        $p = new IngresoData();
        $p->legajo= $_POST["legajo"];
        $p->entrada = $_POST["fecha"];
        $p->add();
         
    }

}
else
{
    $p = new IngresoData();
    $p->legajo= $_POST["legajo"];
    $p->entrada = $_POST["fecha"];
    $p->add();
   
}
Core::redir("./?view=ingresos"); 	

*/
?>

