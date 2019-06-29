<?
require_once("../includes/connection.php");

	if(isset($_POST['eliminar'])){
		
		$id    = $_POST['id'];
		$tabla = $_POST['tabla'];
		$modulo = $_POST['modulo'];
		$modulo_id = $_POST['modulo_id'];
		
		//========================= ELIMINACION DE LA IMAGENES PRINCIPAL DE LA PUBLICACION + LA PUBLICACION  ==========================//
		
		$imagenprincipal = $_POST['imagenprincipal'];
		
		if(!empty($imagenprincipal)){
			
			if($imagenprincipal == 'imagenes/pequenas/camara_01.png'){
				
			}else{
				$explotarnombre = explode("/", $imagenprincipal);
				$nombrearchivo  = $explotarnombre[2];
				
				$nombreA = "../imagenes/pequenas/" . $nombrearchivo;
				$nombreB = "../imagenes/medianas/" . $nombrearchivo;
				$nombreC = "../imagenes/grandes/"  . $nombrearchivo;
				
				unlink($nombreA);
				unlink($nombreB);
				unlink($nombreC);
			}
			
		}else{
			echo "No hay imagen para borrar";	
		}
		
		
		//========================= ELIMINACION DE LAS IMAGENES ADICIONALES DEL ARTICULO ==========================//
			
		$query2 = "SELECT * FROM imagenes_articulos WHERE articulo_id = {$id}";
		$result2 = mysql_query($query2, $connection);
		
		while($imagenes = mysql_fetch_array($result2)){
			$grupoimagenes[] = $imagenes['imagen3'];	
		}
		
		if(!empty($grupoimagenes)){
			
			foreach($grupoimagenes as $imagen){
				
				$explotarnombres = explode("/", $imagen);
				$nombrearchivos = $explotarnombres[2];
				
				$nombre1 = "../imagenes/pequenas/" . $nombrearchivos;
				$nombre2 = "../imagenes/medianas/" . $nombrearchivos;
				$nombre3 = "../imagenes/grandes/"  . $nombrearchivos;

				unlink($nombre1);
				unlink($nombre2);
				
				if(unlink($nombre3)){
					$borrardo_img = "DELETE FROM imagenes_articulos WHERE articulo_id = {$id}";
					$result3 = mysql_query($borrardo_img, $connection);
				}
				// "Borradas";
			}
		}else{
			echo "No hay imagenes para borrar";	
		}
		
		// ======================================  BORRADO DEL ARTICULO ==================================//
		
		$query = "DELETE FROM $tabla WHERE id = {$id} LIMIT 1";
		//$query = "SELECT * FROM $tabla WHERE id = {$id} LIMIT 1";
		$result = mysql_query($query, $connection);
		
		if (mysql_affected_rows() == 1){
			$mensaje = "Se ha eliminado el articulo";
		  	header("Location: ../modulo.php?modulo=". $modulo ."&modulo_id=". $modulo_id);	
		}else{
			$mensaje = "No se ha podido eliminar la publicacion";
		}
		
	}else{
		
	}
	
?>

