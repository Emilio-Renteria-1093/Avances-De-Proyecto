<?php
session_start();
    if(isset($_GET['key'])){
        $key = $_GET['key'];
        if(isset($_SESSION['carrito'][$key]))
        {
            unset($_SESSION['carrito'][$key]);
        }
    }
    header("Location:carrito.php");
?>