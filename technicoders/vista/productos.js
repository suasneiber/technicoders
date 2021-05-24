/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
$(".nuevaFoto").change(function(){

  var imagen = this.files[0];

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    $(".nuevaFoto").val("");

     swal({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else if(imagen["size"] > 2000000){

    $(".nuevaFoto").val("");

     swal({
        title: "Error al subir la imagen",
        text: "¡La imagen no debe pesar más de 2MB!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else{


    var datosImagen = new FileReader;
          datosImagen.readAsDataURL(imagen);
    
          $(datosImagen).on("load", function(event){
    
            var rutaImagen = event.target.result;
            
            $(".previsualizar").attr("src", rutaImagen);

          })
  }

      
    })

$(".tablaProductos").on("click", ".btnEditarProd", function(){
    
    var idProducto = $(this).attr("idProducto")

    var datos = new FormData();
    
    datos.append("idProducto", idProducto);
    
    $.ajax({

        url:"../ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
            console.log('respuesta',respuesta)
        $("#editarNombre").val(respuesta["nombre"]);
        $("#idProducto").val(respuesta["id"]);
        $("#editarPrecio").val(respuesta["precio"]);
        $("#editarStock").val(respuesta["stock"]);
        $("#fotoActual").val(respuesta["imagen"]);
    
          if(respuesta["imagen"] != ""){
    
            $(".previsualizar").attr("src", respuesta["imagen"]);
    
          }
    
        }
    
    
      })
})

/*=============================================
ELIMINAR Producto
=============================================*/

$(".tablaProductos").on("click", ".btnEliminarProd", function(){

    var idProducto = $(this).attr("idProducto");
    
    swal({
      title: '¿Está seguro de borrar el producto?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Producto!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "http://localhost/technicoders/vista/productos.php?idProducto="+idProducto;
  
      }
  
    })
  
  })