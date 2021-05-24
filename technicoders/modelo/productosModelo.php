<?php
    include_once 'conexion.php';

    Class modeloProductos{

        static public function mdlMostrarProductos($tabla, $item,  $valor){
            
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

               
                $stmt -> bindParam(":".$item, $valor,  PDO::PARAM_STR);
                $stmt -> execute();

			    return $stmt -> fetch();

            }else{
                
                

                $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ");
                
                $stmt -> execute();
                
    
                return $stmt -> fetchAll();
             }

            $stmt -> close();
    
            $stmt = null;
        }

        
        /*=============================================
                        EDITAR PRODUCTO
        =============================================*/

        static public function mdlEditarProducto($tabla, $datos)  {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre= :nombre, precio= :precio, stock= :stock, imagen= :imagen WHERE id= :id");
            
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		    $stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt ->bindparam(":stock", $datos["stock"], PDO::PARAM_STR);
            $stmt -> bindparam(":imagen", $datos["imagen"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
            
            if($stmt -> execute()){
                
                return "ok";
            
            }else{
    
                return "error";	
    
            }

            $stmt -> close();

            $stmt = null;
            
         }

         /*=============================================
                        ELIMINAR PRODUCTO
    	=============================================*/

        static public function mdlEliminarProducto($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    
            $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                return "error";	
    
            }
    
            $stmt -> close();
    
            $stmt = null;
    
    
        }

    }