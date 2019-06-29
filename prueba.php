<?php

	$connection = mysqli_connect('localhost', 'root', '');
	mysqli_set_charset($connection, 'utf8');

	if (!$connection){
		die("La conexion a la base de datos fallo: " . mysql_error());
	}

	$db_select = mysqli_select_db($connection, "musicote_base");

	if (!$db_select){
		die("La Seleccion de la base de datos fallo: " . mysql_error());
	}

    $p = mysqli_query($connection, "SELECT titulo, contenido, fecha FROM noticias ORDER BY fecha DESC LIMIT 3");
    $ar = mysqli_fetch_array($p);
	//echo "<pre>" . print_r( $ar ) . "</pre>";

	$arr = ['andrés es un muchacho muy juicioso y, le gustan los pingüinos', 'luz', 'julita'];
	array_push($arr, 'laura');
	//echo "<pre>" . print_r( $arr ) . "</pre>";

	$s_arr = serialize($arr);
	print_r(unserialize($s_arr));

	/**
	 * Crear tipos de contenidos: list, text
	 * las listas van a ser []
	 *
	 *   1. Meta Tags
	 *   2. Contenidos
	 *   3. Galería de Fotos
	 *
	 *   Para la seccion Quienes somos
	 *   Para las bolas las listas deben tener otro tipo de lista. Al crar el contenido tipo lista, esta también debe tener
	 *   un tipo
	 *        [
	 * 				"type": "circulos",
	 * 				"lista": []
	 *         ]
	 *
	 * 			$s_arr = serialize($arr);
				print_r(unserialize($s_arr));

		DB
		Items
		|id|seccion_id|contanido_id|tipo|fecha|titulo|contenido|imagen

		Textos
		|id|title|subTitle|item_id|text

		Sections
		|id|seccion|plantila

		item: {
			id:
			sectionID:
			parentItemID:
			subContentType:
			galleryID:
			isSubContent: Boolean,
			type:
			fecha:
			title:
			subTitulo:
			contentImage: [],
			subContentsTypes: [],
			textos: [],
			items: []
		}
	 */
?>