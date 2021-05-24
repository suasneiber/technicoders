<?php
    session_start();

    if($_SESSION== null){
        header('Location: ../index.php');
        session_unset();
    }else{
        $usuario= $_SESSION['usuario'];
        $nombre = $_SESSION['nombre'];
        $id= $_SESSION['id_usuario'];
        
        
    }

    include '../controlador/productosControlador.php';
    
    $item = null;
    $valor = null;

    $listado = ControladorProductos::ctrMostrarProductos($item,$valor);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <script src="js/sweetalert2.all.js"></script>

    <title>Productos</title>
</head>
<body>
<figure class="text-center">
  <blockquote class="blockquote">
    <p>Tabla de Productos</p>
  </blockquote>
  
</figure>
    <table class="tablaProductos">
        <thead class="thead">
            <tr>
                
                <td>ID</td>
                <td>Nombre de Producto</td>
                <td>Precio</td>
                <td>Stock</td>
                <td>Fecha</td>
                <td>id de usuario</td>
                <td>imagen</td>
                
                <td>Acción</td>
                
            </tr>
        </thead>

        <tbody class="tbody">
        
        <?php

            

            foreach($listado as $key => $value){
    
                echo '<tr class="lista">';
                    echo '<td>'.$value[0];'</td>';
                    echo '<td>'.$value[1];'</td>';
                    echo '<td>'.$value[2];'</td>';
                    echo '<td>'.$value[3];'</td>';
                    echo '<td>'.$value[4];'</td>';
                    echo '<td>'.$value[5];'</td>';
                    echo '<td><img src="'.$value[6].'" class="img-thumbnail" width="50px"></td>';
                    echo    '<td>
                                <button type="button" class="btn btn-warning btnEditarProd" idProducto="'.$value[0].'"  data-bs-toggle="modal" data-bs-target="#modalEditarProducto" >
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" onclick=("hola"); class="btn btn-danger btnEliminarProd" idProducto="'.$value[0].'" >
                                <i class="fa fa-remove"></i>
                                </button>
                            </td>';
                    
                   
                echo '</tr>';
            }
            

            
            ?>
        </tbody>
        
    </table>
    
    


    <!--=====================================
            MODAL EDITAR PRODUCTO
    ======================================-->

    <div class="modal fade" tabindex="-1" id="modalEditarProducto" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form role="form" method="post"                 enctype="multipart/form-data">

                    <div class="modal-header">
                        <h5 class="modal-title">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>          
                    
                        <div class="modal-body">
                            <p>Nombre.</p>
                            <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"  required>

                            <input type="hidden" id="idProducto" name="idProducto">

                            <p>Precio.</p>
                            <input type="text" class="form-control input-lg" id="editarPrecio" name="editarPrecio"  required>

                            <p>Stock</p>
                            <input type="text" class="form-control input-lg" id="editarStock" name="editarStock"  required>

                            <p>imagen</p>
                            <input type="file" class="nuevaFoto" name="editarFoto"  >

                            <img src="/technicoders/img/default.jpg" class="img-thumbnail previsualizar" width="100px">

                            <input type="text" name="fotoActual" id="fotoActual">
                        </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                    </div>
                    <?php
                        $editarProducto = new ControladorProductos();
                        $editarProducto -> ctrEditarProducto();
                    ?>
                </form>
            </div>
        </div>
    </div>
    
    <?php

            $eliminarProducto = new ControladorProductos();
            $eliminarProducto -> ctrEliminarProducto();
    ?>
    
    <script src="productos.js"></script>
</body>
</html>