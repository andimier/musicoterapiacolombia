<?php
	require_once("required/login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ANDIMIER : ENTRADA ADMIN.CONTENIDOS</title>
	<link rel="Stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
	<!-- <div id="cabezote"></div> -->
	<div id="pagina">

		<div class="contenido1">

			<form method="post">
				<table>
					<tr><td>Nombre de Usuario</td></tr>
					<tr>
						<td>
							<input
								name="username"
								type="text"
								value="<?php echo htmlentities($username);?>"
								maxlength="50"
								size="50"
								height="30" />
						</td>
					</tr>

					<tr><td>Tu Contraseña</td></tr>
					<tr>
						<td>
							<input type="password" name="password" maxlength="50" size="50" height="30" value="<?php echo $password; ?>" />
							<br />
							<br />
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" class="boton" value="Ingresar" />
						</td>
					</tr>

					<tr><td>
					<br />
					<hr />
					<div class="mensajelogin">
						<?php echo $error_message; ?>
					</div>

					</td></tr>

				</table>
			</form>

		</div>
	</div>
</body>
</html>

<?php
if(isset($connection)){
	mysqli_close($connection);
}
?>
