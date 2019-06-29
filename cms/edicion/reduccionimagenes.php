<?php
function reducir_imagen($ruta_origen, $ruta_destino, $w, $h, $ext){
	
	list($w_orig, $h_orig,) = getimagesize($ruta_origen);
	$scale_ratio = $w_orig / $h_orig;

	if (($w/$h) > $scale_ratio){
		$w = $h * $scale_ratio;
	}else{
		$h = $w / $scale_ratio;
	}

	$img = "";

	$ext = strtolower($ext);
	
	if($ext == "gif"){
		$img = imagecreatefromgif($ruta_origen);
	}else if($ext == "png"){
		$img = imagecreatefrompng("$ruta_origen");
	}else{
		$img = imagecreatefromjpeg("$ruta_origen");
	}

	$basenuevaimagen = imagecreatetruecolor($w, $h);  //  esta funcion crea un rec negro com los parametros dados
	imagecopyresampled($basenuevaimagen, $img, 0,0,0,0, $w, $h, $w_orig, $h_orig);
	if(imagejpeg($basenuevaimagen, $ruta_destino, 80)){
		//no importa que se cree con jpeg, aun asín mantienen su extension original
		/// CROP
		$archivo_origen  = $ruta_destino;
		$destino_crop    = $ruta_destino;
		$wthumb = 250;
		$hthumb = 250;
		crop_imagen($archivo_origen, $destino_crop, $wthumb, $hthumb, $ext);
	}
}


/////CROP 1

function crop_imagen($ruta_origen, $ruta_destino, $w, $h, $ext){
	
	list($w_orig, $h_orig) = getimagesize($ruta_origen);
	$src_x = ($w_orig/2) - ($w/2);
	$src_y = ($h_orig/2) - ($h/2);

	$ext = strtolower($ext);
	$img = "";

	$ext = strtolower($ext);
	
	if($ext == "gif"){
		$img = imagecreatefromgif($ruta_origen);
	}else if($ext == "png"){
		$img = imagecreatefrompng("$ruta_origen");
	}else{
		$img = imagecreatefromjpeg("$ruta_origen");
	}

	$basenuevaimagen2 = imagecreatetruecolor($w,$h);
	imagecopyresampled($basenuevaimagen2, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);

	if($ext == "gif"){
		imagegif($basenuevaimagen2, $ruta_destino);
	}else if($ext == "png"){
		imagepng($basenuevaimagen2, $ruta_destino);
	}else{
		imagejpeg($basenuevaimagen2, $ruta_destino, 80);
	}
	
	
	//=== PARAMETROS PARA LA FUNCION DE REDUCCION 2
	$archivoarray = explode('/', $ruta_origen);
	$dedonde = $archivoarray[0];
	
	if($dedonde == '..'){
		$archivo = $archivoarray[3];
		$ruta_destino2 = '../imagenes/pequenas/'. $archivo;
	}else{
		$archivo = $archivoarray[2];
		$ruta_destino2 = 'imagenes/pequenas/'. $archivo;
	}
	
	//echo "<br />" .$ruta_destino2;
	reducir_imagen2($ruta_origen, $ruta_destino2, $ext);
}



function reducir_imagen2($ruta_origen, $ruta_destino2, $ext){
	
	list($w_orig, $h_orig,) = getimagesize($ruta_origen);
	$scale_ratio = 0.6;
	
	$nuevo_w = $w_orig * $scale_ratio;
	$nuevo_h = $h_orig * $scale_ratio;
	
	$img = "";

	$ext = strtolower($ext);
	
	if($ext == "gif"){
		$img = imagecreatefromgif($ruta_origen);
	}else if($ext == "png"){
		$img = imagecreatefrompng("$ruta_origen");
	}else{
		$img = imagecreatefromjpeg("$ruta_origen");
	}

	$basenuevaimagen = imagecreatetruecolor($nuevo_w, $nuevo_h);  //  esta funcion crea un rec negro com los parametros dados
	imagecopyresampled($basenuevaimagen, $img, 0,0,0,0, $nuevo_w, $nuevo_h, $w_orig, $h_orig);
	if(imagejpeg($basenuevaimagen, $ruta_destino2, 80)){
		//echo "<br /> EXITO!!";
	}
}
?>