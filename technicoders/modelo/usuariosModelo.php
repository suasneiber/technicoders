<?php
include_once "conexion.php";

Class ModeloMostrarUsuarios{
    static public function mdlMostrarUsuarios($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = ".$item);

            $stmt -> bindParam(":".$item, $valor,  PDO::PARAM_STR);
            

            $stmt -> execute();
            return $stmt -> fetch();

        
        }
        

       
    }
}