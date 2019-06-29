<?

function reducir_imagen($target, $newcopy, $w, $h, $ext){
	
	list($w_orig, $h_orig,) = getimagesize($target);
	$scale_ratio = $w_orig / $h_orig;

	if (($w/$h) > $scale_ratio){
		$w = $h * $scale_ratio;
	}else{
		$h = $w / $scale_ratio;
	}

	$img = "";

	$ext = strtolower($ext);
	if($ext == "gif"){
		$img = imagecreatefromgif($target);
	}else if($ext == "png"){
		$img = imagecreatefrompng("$target");
	}else{
		$img = imagecreatefromjpeg("$target");
	}

	// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
	$tci = imagecreatetruecolor($w, $h);  //  esta funcion crea un rec negro com los parametros dados
	imagecopyresampled($tci, $img, 0,0,0,0, $w,$h,$w_orig,$h_orig);
	imagejpeg($tci, $newcopy, 80);  //no importa que se cree con jpeg, aun asín mantienen su extension original
}


/////CROP 

function crop_imagen($target, $newcopy, $w, $h, $ext){
	list($w_orig, $h_orig) = getimagesize($target);
	$src_x = ($w_orig/2) - ($w/2);
	$src_y = ($h_orig/2) - ($h/2);

	$ext = strtolower($ext);
	$img = "";

	$ext = strtolower($ext);
	if($ext == "gif"){
		$img = imagecreatefromgif($target);
	}else if($ext == "png"){
		$img = imagecreatefrompng("$target");
	}else{
		$img = imagecreatefromjpeg("$target");
	}

	$tci = imagecreatetruecolor($w,$h);
	imagecopyresampled($tci, $img,0,0, $src_x,$src_y,$w,$h,$w,$h);

	if($ext == "gif"){
		imagegif($tci, $newcopy);
	}else if($ext == "png"){
		imagepng($tci, $newcopy);
	}else{
		imagejpeg($tci, $newcopy, 80);
	}
}
?>