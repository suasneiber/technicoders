<?php
    include_once '../modelo/productosModelo.php';
    
    Class ControladorProductos {

        static public function ctrMostrarProductos($item, $valor)   {

            $tabla = 'prdcts';
            
            $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item,  $valor);

            
            return $respuesta;

            
        }

        /*=============================================
        EDITAR PRODUCTO
        =============================================*/

        static public function ctrEditarProducto(){
            
            if(isset($_POST['idProducto'])){
                
                
                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                    
                /*=============================================
                VALIDAR IMAGEN
                =============================================*/
                
                
                $ruta = $_POST["fotoActual"];
                
                
                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    $nombre = $_FILES["editarFoto"]['name'];

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
				// 	DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				// 	=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
				// 		GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				// 		=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "/technicoders/img/".$nombre;

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "/technicoders/img/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}
                






                    $tabla = 'prdcts';
    
                    $datos = array("id" => $_POST["idProducto"],
                    "nombre" => $_POST["editarNombre"],
                    "precio" => $_POST["editarPrecio"],
                    "stock" => $_POST["editarStock"],
                    "imagen" => $ruta);

                    
                    $respuesta = modeloProductos::mdlEditarProducto($tabla, $datos);
                    
                    if($respuesta == "ok"){
    
                        echo'<script>
    
                                swal({
                                    type: "success",
                                    title: "El producto ha sido editado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result) {
                                        if (result.value) {
                
                                        window.location = "http://localhost/technicoders/vista/productos.php";
                
                                        }
                                    })
    
                            </script>';
    
                    }else{

                        echo'<script>
        
                            swal({
                                  type: "error",
                                  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result) {
                                    if (result.value) {
        
                                    window.location = "perfiles";
        
                                    }
                                })
        
                          </script>';
        
                    }
                }


               
                
            }

        }

        /*=============================================
	                    ELIMINAR PRODUCTO
	    =============================================*/

	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="prdcts";
			$datos = $_GET["idProducto"];


			$respuesta = modeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
                        if (result.value) {

                        window.location = "http://localhost/technicoders/vista/productos.php";

                        }
                    })
				</script>';

			}		

		}

	}

    }