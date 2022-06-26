<?php
/**
* @author Lokisho27
* @brief Eliminar un post
**/
		CommentData::delById($_GET["id"]);
		Core::redir("./?view=msgs");
?>