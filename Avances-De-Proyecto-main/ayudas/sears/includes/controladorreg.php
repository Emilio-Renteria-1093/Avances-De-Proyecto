<?php
    require 'db.php';

    if(!empty($_POST['reg'])){
        $nom = $_POST['nombre'];
        $app = $_POST['apep'];
        $apm = $_POST['apem'];
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $md5pass = md5($contra);
        if(empty($nom) ||empty($app)||empty($apm)||empty($correo)||empty($contra)){
            header("location: ../vistas/registro.php");
        }else{
            $sql = $conn->query("INSERT INTO usuarios(`nombre`,`apellido paterno`,`apellido materno`,`correo`,`contra`) VALUES ('$nom','$app','$apm','$correo','$md5pass')");
        }

    }else if(!empty($_POST['in'])){
        header("location: ../vistas/login.php");
    }
?>