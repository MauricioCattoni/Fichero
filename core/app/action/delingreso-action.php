<?php
/**
* @author Lokisho27
* @brief Eliminar un post
**/
		IngresoData::delById($_GET["id"]);
		Core::redir("./?view=ingresos");
?>