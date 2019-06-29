<?php
	function redirect_to($location = NULL){
		if ($location !=NULL){
			header("Location: {$location}");
			exit;
		} 
	} 

	function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_scape_string");
		
		if($new_enough_php){
			if($magic_quotes_active){$value = stripslashes($value);}
			$value = mysql_real_scape_string($value);
		}else{
			if(!$magic_quotes_active){$value = addslashes($value);}
		}
		return $value;
	}
	
	function confirm_query($result_set){
		if(!$result_set){
			die("La busqueda en la Base de Datos fallo: " . mysql_error());
		}
	}
	
	function traer_todos_los_meses(){
		global $connection;
		$query = "SELECT * 
		FROM noticias 
		ORDER BY id ASC";
			
		$grupo_meses = mysql_query($query, $connection);
		confirm_query($grupo_meses);
		return $grupo_meses;
	}
	
	function traer_todos_los_albumes(){
		global $connection;
		$query = "SELECT * FROM albumes ORDER BY album_id ASC";
			
		$grupo_albumes = mysql_query($query, $connection);
		confirm_query($grupo_albumes);
		return $grupo_albumes;
	}
	
	function traer_todos_los_perfiles(){
		global $connection;
		$query = "SELECT * FROM perfiles ORDER BY id ASC";
			
		$grupo_perfiles = mysql_query($query, $connection);
		confirm_query($grupo_perfiles);
		return $grupo_perfiles;
	}
	
	function traer_noticias_por_mes($noticias_id){
		global $connection;
		$query = "SELECT * FROM noticias_meses WHERE noticias_id = {$noticias_id} ORDER BY fecha DESC";
		
		$grupo_noticias = mysql_query($query, $connection);
		confirm_query($grupo_noticias);	
		return $grupo_noticias;
	}
	
	function traer_mes_por_id($mes_id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM noticias ";
		$query .= "WHERE id=" . $mes_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
	
		if($mes = mysql_fetch_array($result_set)){
			return $mes;
		}else{
			return NULL;
		}
	}
	
	function traer_noticia_por_id($noticias_id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM noticias_meses ";
		$query .= "WHERE id=" . $noticias_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
	
		if($noticia = mysql_fetch_array($result_set)){
			return $noticia;
		}else{
			return NULL;
		}
	}
	
	function traer_album_por_id($album_id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM albumes ";
		$query .= "WHERE album_id=" . $album_id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
	
		if($album = mysql_fetch_array($result_set)){
			return $album;
		}else{
			return NULL;
		}
	}
	
	function traer_perfil_por_id($id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM perfiles ";
		$query .= "WHERE id=" . $id ." ";
		$query .= "LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
	
		if($perfil = mysql_fetch_array($result_set)){
			return $perfil;
		}else{
			return NULL;
		}
	}
	
	function encontrar_mes_y_noticia_seleccionada(){
		global $mes_seleccionado;
		global $noticia_seleccionada;
		global $album_seleccionado;
		
		if(isset($_GET['mes'])){
			$sel_mes = $_GET['mes'];
			$mes_seleccionado = traer_mes_por_id($sel_mes);
			
			$sel_album = "";
			$sel_noticia = "";
			$noticia_seleccionada = NULL;
			$album_seleccionado = NULL;
			
		}elseif(isset($_GET['noticia'])){
			$sel_noticia = $_GET['noticia'];
			$noticia_seleccionada = traer_noticia_por_id($sel_noticia);
			
			$sel_album = "";
			$sel_mes = "";
			$mes_seleccionado = NULL;
			$album_seleccionado = NULL;
			
		}elseif(isset($_GET['album'])){
			$sel_album = $_GET['album'];
			$album_seleccionado = traer_album_por_id($sel_album);
			
			$sel_noticia = "";
			$sel_mes = "";
			$mes_seleccionado = NULL;
			$noticia_seleccionada = NULL;
			
		}else{
			$sel_mes = "";
			$sel_noticia = "";
			$sel_album = "";
			$mes_seleccionado = NULL;
			$noticia_seleccionada = NULL;
			$album_seleccionado = NULL;
		}	
	}
	
	function navegacion($noticia_seleccionada, $mes_seleccionado){
	
		$grupo_meses = traer_todos_los_meses();
		$grupo_albumes = traer_todos_los_albumes();
		$grupo_perfiles = traer_todos_los_perfiles();
		// Cambie la variable $subject por $mes
		echo "<h2>Secciones</h2>";
    	while($mes = mysql_fetch_array($grupo_meses)){
    		echo "<a href=\"editar_mes.php?mes=" . urlencode($mes["id"]) . "\">{$mes["titulo"]}</a></li><br />";
		}
		echo "<a href=\"blog.php\"/><h2>Blog</h2></a>";
		////PERFILES
		echo "<a href=\"perfiles.php\"/><h2>Perfiles</h2></a>";
		
		///////ALBUMES
		echo "<a href=\"albumes.php\"/><h2>Albumes</h2></a>";
	}


///////////////////////////////////////////////


	function traer_seccion_por_id($id){
		global $connection;
		$query = "SELECT * FROM noticias WHERE id = $id LIMIT 1";
		
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
	
		if($seccion = mysql_fetch_array($result_set)){
			return $seccion;
		}else{
			return NULL;
		}
	}

	function encontrar_seccion_seleccionada(){
		global $seccion_seleccionada;
		
		if(isset($_GET['seccion'])){
			$sel_seccion = $_GET['seccion'];
			$seccion_seleccionada = traer_seccion_por_id($sel_seccion);
		}
	}

//////////////////////////////////////////////////////////////
	
?>