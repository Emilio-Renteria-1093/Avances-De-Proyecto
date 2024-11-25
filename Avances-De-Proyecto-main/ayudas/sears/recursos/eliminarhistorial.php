<?php
    session_start();
    require '../includes/db.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = $conn->query("DELETE FROM historial WHERE id_historial='$id'");
        if($sql){
            header("Location: historial.php");
        }
    }
?>