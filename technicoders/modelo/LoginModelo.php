<?php

include_once 'conexion.php';
Class ModeloUsuarios{
        static public function mdlMostrarUsuario($tabla, $item, $valor){

            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT  * FROM $tabla WHERE $item = :$item ");

                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                
                return $stmt -> fetch();
                
            }else{
                echo "error de id";
            }


        }
    }
?>