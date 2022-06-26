<?php
/**
* @author Lokisho27
* @brief Agregar un usuario
**/
		$p = new IngresoData();
		$p->legajo= $_POST["legajo"];
		$p->name = $_POST["name"];
	
		$img = "";
		if(isset($_FILES["image"])){
			$image=new Upload($_FILES["image"]);
			if($image->uploaded){
				$image->Process("storage/images/");
				if($image->processed){
					$img = $image->file_dst_name;
				}
			}
		}
        $p->image=$img;
        $p->entrada = $_POST["entrada"];
        $p->salida = $_POST["salida"];
		$px = $p->add();

		Core::redir("./?view=newingreso");
?>