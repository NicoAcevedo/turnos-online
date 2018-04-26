<?php  
/*include'funciones1.php';
Conectar();*/
if (isset($usu)){
		session_start();
		session_register('usuario');
		session_register('id_usu');
		session_register('contrasenia');
		session_register('apellido');
		session_register('nombre');
		session_register('tipo');
		$usuario=test_input($usu);
		$contrasenia=test_input($contras);
		$resultado=mysql_query("select * from usuarios where email='$usuario' and contrasenia=$contrasenia");
		if ($row=mysql_fetch_array($resultado)){
			 		$id_usu=$row[Id];
			 		$nombre=$row[nombre];
					$apellido=$row[apellido];
					$tipo=$row[id_tipo];
					switch ($tipo) {
		    			case 0:
		        			header('Location: /seminario/odontologos/odontologo.php?');
		        		break;
		    			case 1:
		        			header('Location: /seminario/afiliados/afiliado.php?');
		        		break;
		    			case 2:
		        			header('Location: /seminario/administrador/administrador.php?');
		        		break;

					} 
			}  
			else {
				//if (isset($d)){session_destroy();}
				
				$mensaje='
				<!DOCTYPE html>
				<html lang="es">
				<head>
					<meta charset="UTF-8">
					<title>DENTIS</title>
					<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
					<link rel="stylesheet" href="css/bootstrap.min.css">
					<link rel="stylesheet" href="css/login-style.css">
					<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
					<script src="js/funciones.js"></script>
				</head>
				<body>
					<div class="container">
				        <div class="card card-container">
				           
				            <img id="profile-img" class="profile-img-card" src="imagenes/salud.png" />
				            
				            <form class="form-signin" action="index.php" method="post">
				                <span id="reauth-email" class="reauth-email"></span>
				                <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="usu" required autofocus>
				                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="contras" required>
				                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar Sesión</button>
				            </form>
				        </div>
				    </div>
					<div class="alert alert-danger">
					    <strong>Sr/a</strong> Problemas en el Acceso verifique Usuario y Contraseña.
					</div>


					<script src="js/jquery-3.1.1.min.js"></script>
					<script scr="js/bootstrap.min.js"></script>
				</body>
				</html>';
			}
} else {
	$mensaje='
				<!DOCTYPE html>
				<html lang="es">
				<head>
					<meta charset="UTF-8">
					<title>DENTIS</title>
					<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
					<link rel="stylesheet" href="css/bootstrap.min.css">
					<link rel="stylesheet" href="css/login-style.css">
					<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
					<script src="js/funciones.js"></script>
				</head>
				<body>
					<div class="container">
				        <div class="card card-container">
				           
				            <img id="profile-img" class="profile-img-card" src="imagenes/salud.png" />
				            
				            <form class="form-signin" action="index.php" method="post">
				                <span id="reauth-email" class="reauth-email"></span>
				                <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="usu" required autofocus>
				                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="contras" required>
				                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar Sesión</button>
				            </form>
				        </div>
				    </div>
				    <script src="js/jquery-3.1.1.min.js"></script>
					<script scr="js/bootstrap.min.js"></script>
				</body>
				</html>';
}
echo $mensaje;
?>