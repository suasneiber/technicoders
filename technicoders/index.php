<?php

include 'controlador/loginControlador.php';
    include "modelo/conexion.php";

    if($usuario == ""){
        echo "por favor debe registrarse";

        header('Location: vista/login.php');
    }
    else{
        header('Location: vista/principal.php');
    }


?>