<?
require_once("../includes/connection.php");

	if(isset($_GET['imagen_id'])){
		$imagen_id   = $_GET['imagen_id'];
		$articulo_id = $_GET['articulo_id'];
		$modulo      = $_GET['modulo'];
		$tabla = 'imagenes_articulos';
		
		$query = "SELECT * FROM $tabla WHERE id = {$imagen_id} LIMIT 1";
		$result = mysql_query($query, $connection);
		$imagen = mysql_fetch_array($result);

		$nombre1 =  "../". $imagen['imagen1'];
		$nombre2 =  "../". $imagen['imagen2'];
		$nombre3 =  "../". $imagen['imagen3'];
		
		echo $nombre1 . "<br />";
		echo $nombre2 . "<br />";
		echo $nombre3 . "<br />";
		
		if(unlink($nombre1)){
			
			unlink($nombre2);
			unlink($nombre3);
			
			$queryborrado = "DELETE FROM $tabla WHERE id = {$imagen_id} LIMIT 1";
			$result2 = mysql_query($queryborrado, $connection);
			
			if (mysql_affected_rows() == 1){
				
				$mensaje = "La imagen se ha borrado satisfactoriamente";
				header('Location: ../editar-articulo.php?articulo_id='. $articulo_id .'&modulo='. $modulo);	
				//echo "funciona";
			}else{
				$mensaje = "No se ha podido eliminar la publicacion";
			}
		}
		
	}else{
		
	}
	
?>

