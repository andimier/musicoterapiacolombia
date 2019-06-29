<?php
	if (!isset($_SESSION)){
		//session_start();
	}
	$MM_authorizedUsers = "";
	$MM_donotCheckaccess = "true";

	// function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  	// 	$isValid = False;
  	// 	if (!empty($UserName)) {
   	//   		$arrUsers = Explode(",", $strUsers);
    // 		$arrGroups = Explode(",", $strGroups);
    // 		if (in_array($UserName, $arrUsers)) {
    //  			$isValid = true;
    // 		}
    // 		if (in_array($UserGroup, $arrGroups)) {
    //   			$isValid = true;
    // 		}
    // 		if (($strUsers == "") && true) {
    //   			$isValid = true;
    // 		}
  	// 	}
 	//  return $isValid;
	// }

	$MM_restrictGoTo = "login.php";

	if (!isset($_SESSION['user_id'])) {
		$MM_qsChar = "?";
		$MM_referrer = $_SERVER['PHP_SELF'];

		if (strpos($MM_restrictGoTo, "?")) {
			$MM_qsChar = "&";
		}

		$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);

		//header("Location: ". $MM_restrictGoTo);
		//exit;
	}

	require_once("includes/connection.php");
	require_once("includes/functions.php");

?>
<?php
	if(isset($_POST['submit'])){
		$errores = array();
		$required_fields = array('username','password');
		//$errores = array_merge($errores, $required_fields);
		//$errores = array_merge($errores, check_required_fields($required_fields, $_POST));
		foreach($required_fields as $fieldname){
			if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
				$errores[] = $fieldname;
			}
		}

		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		//algoritmos de incriptacion
		//$hashed_password = md5($password);
		//$hashed_password = hash($password);
		$hashed_password = sha1($password);


		if(empty($errores)){
			$query = "INSERT INTO usuarios (username, hashed_password) VALUES ('{$username}','{$hashed_password}')";
			$result = mysqli_query($connection, $query);

			if($result){
				 $mensaje = "El usuario fué creado correctamente!";
			}else{
				 $mensaje = "No se creó el usuario!"	;
				 $mensaje .="<br />" . mysql_error();
			}
		}else{
			if(count($errores) ==1){
				 $mensaje = "Hubo un error en el formulario.";
			}else{
				 $mensaje = "Hubo " . count($errores) . " errores en el formulario.";
				 $mensaje = mysql_error();
			}
		}
	}else{
		$username = "";
		$password = "";
	}
?>

<?php require_once("includes/header.php");?>

<table id="structure">
	<tr>
		<td id="navigation"> <a href="staff.php"></a><br />
		<br />
		</td>
		<td id="page">
       <?php
	   if(isset($_POST['submit'])){
      	  if(empty($errores)){echo "<p><h2>" . $mensaje . "</h2></p>";}
       	  if(!empty($errores)){
			 echo "<p class =\"errors\">";
			 echo "Por favor ingrese los siguientes campos:<br />";
				 foreach($errores as $error){
				 	echo " - " . $error . "<br/>";
				 }
			 echo "</p>";
		  }
	   }?>

		<h2>Crear Usuario</h2>
        <?php
        if(isset($_POST['submit'])){
		   if(empty($mensaje)){echo "<p class=\"mensaje\">" . $mensaje . "</p>";}
		   if(!empty($errores)){	//mostrar errores
		   }
		}?>
        <form action="nuevo_usuario.php" method="post">
        <table>
        <tr>
        <td>Nombre de Usuario&nbsp;</td>
        <td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username);?>"/></td>
        </tr>
        <tr>
        <td>Contraseña</td>
        <td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password)?>" /></td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" name="submit" value="Crear Usuario" />
        </td>
        </tr>
        </table>
        </form>
        </td>
   </tr>
</table>

<?php require("includes/footer.php");?>
