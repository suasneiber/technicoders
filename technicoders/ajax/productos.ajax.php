<?php 

require_once "../controlador/productosControlador.php";
require_once "../modelo/productosModelo.php";

Class AjaxProductos{

	public $idProducto;

	public function ajaxEditarProducto(){
		
		$item = "id";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item,  $valor);

		
		echo json_encode($respuesta);
		
		

	}
}
    /*=============================================
EDITAR PRODUCTO
=============================================*/
    if(isset($_POST["idProducto"])){
		
        $editar = new AjaxProductos();
        $editar -> idProducto = $_POST["idProducto"];
	    $editar -> ajaxEditarProducto();



}