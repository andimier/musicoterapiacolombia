<?
require_once("../includes/connection.php");

	if(isset($_GET['id'])){
		$imagen_id = $_GET['id'];
		$publicacion_id = $_GET['publicacion'];
		$tabla = 'imagenes_publicaciones';
		
		$query = "SELECT * FROM $tabla WHERE id = {$imagen_id} LIMIT 1";
		$result = mysql_query($query, $connection);
		$imagen = mysql_fetch_array($result);
		
		$nombre1 =  "../". $imagen['imagen1'];
		$nombre2 =  "../". $imagen['imagen2'];
		$nombre3 =  "../". $imagen['imagen3'];
		/*
		echo $nombre1 . "<br />";
		echo $nombre2 . "<br />";
		echo $nombre3 . "<br />";
		*/
		if(unlink($nombre1)){
			
			unlink($nombre2);
			unlink($nombre3);
			
			$queryborrado = "DELETE FROM $tabla WHERE id = {$imagen_id} LIMIT 1";
			$result2 = mysql_query($queryborrado, $connection);
			
			if (mysql_affected_rows() == 1){
				
				$mensaje = "La imagen se ha borrado satisfactoriamente";
				header('Location: ../editar-publicacion.php?publicacion_id='. $publicacion_id);	
				//echo "funciona";
			}else{
				$mensaje = "No se ha podido eliminar la publicacion";
			}
		}
		
	}else{
		
	}
	
?>

