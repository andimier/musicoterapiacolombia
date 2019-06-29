<? // ======================================== ACTUALIZACION DE LOS CONTENIDOS ========================================
	
	if(isset($_POST['areadetexto'])){
		
		$errores = array();
		$required_fields = array('titulo','areadetexto');
		
		foreach($required_fields as $fieldname){
			if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
				$errores[] = $fieldname;	
			}
		}
		if(empty($errores)){
			
			$tabla     = $_POST['tabla'];
			$id        = mysql_prep($_POST['id']);
			$fecha     = mysql_prep($_POST['fecha']);
			$titulo    = trim(mysql_prep($_POST['titulo']));
			$contenido = mysql_prep($_POST['areadetexto']);
			
			
			$query = "UPDATE $tabla 
					  SET  titulo = '{$titulo}', fecha = '{$fecha}', contenido = '{$contenido}'
					  WHERE id = {$id}
					  ";
			$result = mysql_query($query, $connection);
			
			if(mysql_affected_rows() == 1){
				$mensaje = "<h4>La Sección fue actualizada correctamente!</h4>
				---------------------------------------------------------------------------------------<br /><br />";
			}else{
				$mensaje = "<h4>La Sección no fue actualizada. No hiciste ningún cambio.</h4>				---------------------------------------------------------------------------------------<br /><br />";
			}
		}else{
			if(count($errores) == 1){
				 $mensaje = "Dejaste este campo vacío:" . $errores[0];
			}else if(count($errores) == 2){
				//$mensaje = "Dejaste " . count($errores) . " campos vacíos:";
				echo count($errores);
				foreach($errores as $error){
					$mensaje = "- " . $error . "<br />";
				}
				echo "</h4>-----------------------------------------------------------------------------------------------------------------";
			}
		}
	}
?>

