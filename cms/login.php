<?php require_once("required/login.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ANDIMIER : ENTRADA ADMIN.CONTENIDOS</title>
		<link rel="Stylesheet" type="text/css" href="css/main.css" />
	</head>

	<body>
		<header class="header"></header>
		<main class="login-container">
			<section class="login">
				<form method="post">
					<label>Nombre de Usuario</label>
					<input name="username" type="text" value="<?php echo htmlentities($username);?>" maxlength="50" size="50" height="30" />

					<label>Tu Contraseña</label>
					<input type="password" name="password" maxlength="50" size="50" height="30" value="<?php echo $password; ?>" />

					<input type="submit" name="submit" class="button" value="Ingresar" />

					<?php if (!empty($error_message)): ?>
						<div class="login-message">
							<?php echo $error_message; ?>
						</div>
					<?php endif; ?>
				</form>
			</section>
		</main>
	</body>
</html>

<?php if(isset($connection)) mysqli_close($connection); ?>
