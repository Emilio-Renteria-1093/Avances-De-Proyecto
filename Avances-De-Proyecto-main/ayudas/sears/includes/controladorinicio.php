<?php
session_start();
    include 'db.php';
    if(!empty($_POST['in'])){
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $md5pass = md5($contra);

        $sql = $conn->query("SELECT * FROM usuarios WHERE '$correo' = correo AND '$md5pass' = contra");
        if($datos = $sql->fetch_object()){
            $_SESSION['id'] = $datos->id_usuario;
            $_SESSION['nombre'] = $datos->nombre;
            $_SESSION['correo'] = $datos->correo;
            $_SESSION['contra'] = $datos->contra;
            $_SESSION['admin'] = $datos->admin;
            header("location: ../index.php");
        }else{
            echo "<script>
            var alerta = alert('Usuario y/o Contraseña incorrectos');
            window.location.assign('../vistas/login.php');
            </script>";
        }
    }else if(!empty($_POST['reg'])){
        header("location: ../vistas/registro.php");
    }
?>