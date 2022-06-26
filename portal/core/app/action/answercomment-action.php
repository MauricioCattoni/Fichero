<?php
/**
* @author Lokisho27
* @brief Responder comentarios
**/
		$cat = new CommentData();
		$cat->content = $_POST["content"];
		$cat->comment_id = $_POST["comment_id"];
		$cat->answer();
		Core::redir("./?view=comments");
?>