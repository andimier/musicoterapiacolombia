<?php
require_once("../includes/connection.php");

	if(isset($_POST['eliminar'])){
		
		$id              = $_POST['id'];
		$tabla           = $_POST['tabla'];
		
			
		// ======================================  BORRADO DE LA PUBLICACION ==================================//
		
		$query = "DELETE FROM $tabla WHERE id = {$id} LIMIT 1";
		
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1){
			$mensaje = "Se ha eliminado la noticia";
		  	header("Location: ../noticias.php");	
		}else{
			$mensaje = "No se ha podido eliminar la publicacion";
		}
		
	}else{
		
	}
	
?>

