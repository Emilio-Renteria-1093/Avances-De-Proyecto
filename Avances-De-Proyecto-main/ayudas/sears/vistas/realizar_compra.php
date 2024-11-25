<?php
    session_start();
    require '../includes/db.php';
    if(isset($_SESSION['carrito'])&& !empty($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
            header('location: ../index.php');
    }
?>