<?php
    include '../controlador/loginControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nombre de usuario:</td>
                <td><input type="text" name="ingresar_usuario" id=""></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" name="iniciarSesion" value="Ingresar"></td>
            </tr>
        </table>

        <?php

				$ingresoUsuario = new ControladorUsuarios();
				$ingresoUsuario -> ctrIngresoUsuario();

		?>
    </form>
</body>
</html>