<?php
    session_start();
    require 'db.php';
    if(isset($_POST['añadir'])){
        $id_cliente = $_SESSION['id'];
        $nombre_cliente = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
        $id = $_POST['id'];
        $img = $_POST['img'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        
        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }
        $producto = array(
            'id' => $id,
            'img' => $img,
            'nombre' => $nombre,
            'precio' => $precio
          );
    
        $sql = $conn->query("INSERT INTO historial(id_cliente,id_producto,nombre_producto,nombre,correo,img) VALUES ('$id_cliente','$id','$nombre','$nombre_cliente','$correo','$img')");
        
    array_push($_SESSION['carrito'],$producto);
    header('location: ../vistas/carrito.php');
}else if(isset($_POST['iniciar'])){
    header('location: ../vistas/login.php');
}
?>