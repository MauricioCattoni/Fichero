<?php
/**
* @author Lokisho27
* @brief Actualizar un usuario
**/

		$p = UserData::getById($_POST["id"]);
		$p->name = $_POST["name"];
		$p->lastname = $_POST["lastname"];
		$p->legajo = $_POST["legajo"];
		$p->email = $_POST["email"];
		$p->password = $_POST["password"];
		$p->kind_id = $_POST["kind_id"];
		$p->status = isset($_POST["status"])?1:0;
		
		$p->update();



		if(isset($_FILES["image"])){
			$image=new Upload($_FILES["image"]);
			if($image->uploaded){
				$image->Process("storage/images/");
				if($image->processed){
					$p = UserData::getById($_POST["id"]);
					$p->image=$image->file_dst_name;
					$p->update_img();
				}
			}
		}


		if($_POST["password"]!=""){
		$p = UserData::getById($_POST["id"]);
		$p->password= sha1(md5($_POST["password"]));
		$p->update_passwd();

		}



		Core::redir("./?view=edituser&id=".$_POST["id"]);
?>