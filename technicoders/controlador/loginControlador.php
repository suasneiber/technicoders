<?php


include '../modelo/usuariosModelo.php';
include '../modelo/LoginModelo.php';
    Class ControladorUsuarios{

        public function ctrIngresoUsuario(){

            if(isset($_POST['ingresar_usuario'])){

                $tabla = 'usuarios';
                $item = 'usuario';
                $valor = $_POST['ingresar_usuario'];
                
                $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
                
                $encriptar = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                if($respuesta['usuario'] == $_POST['ingresar_usuario'] && crypt($respuesta['contraseña'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$') == $encriptar){  
                    session_start();
                    $_SESSION['usuario'] = $respuesta['usuario'];

                    $_SESSION['password'] = $respuesta['contraseña'];

                    $_SESSION['id_usuario']= $respuesta['id_usuario'];

                    $_SESSION['nombre']= $respuesta['nombre'];

                    
                    header('Location: ../vista/principal.php');
                    
                }else{
                    echo '<script>alert("Por Favor Verifique Los Datos Ingresados "); </script>';
                    header('refresh:1;url= ../vista/login.php');
                    
                    
                }

            }
        }

        /*=============================================
        MOSTRAR USUARIO
        =============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = 'usuarios';
        $item= 'id';

		$respuesta = ModeloMostrarUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        
		return $respuesta;
	
	}
}
    
?>