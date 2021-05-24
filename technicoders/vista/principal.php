<?php
session_start();

if($_SESSION== null){
    header('Location: ../index.php');
    session_unset();
}
else{
    $usuario = $_SESSION['nombre'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <div>
        <button><a href="productos.php" >Productos</a> </button>
        <button class="miPerfil"><a href="miPerfil.php">Mi Perfil</a</button>
    </div>

  
</body>
</html>



