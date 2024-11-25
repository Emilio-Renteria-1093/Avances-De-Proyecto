<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARS</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>
<style>
    table tr td img{
        width: 100px;
    }
    .footer{
        position: static;
        bottom: 0;
    }
    form{
        position: relative;
        width: 100%;
        height: 40px;
        margin-bottom: 20px;
        display: flex;
    }
    form input{
        margin-top: 10px;
        margin-left: 10px;
        padding: 20px;
        display: flex;
    }
    form input[type=text]:focus{
        outline: none;
        border: 2px solid #00429B;
    }
    form button{
        position: relative;
        padding: 22px;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 10px;
        background: #00429B;
        border: none;
        outline: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
<header>
        <div class="logo">
            <a href="../index.php"><img src="logo_white.svg" alt=""></a>
        </div>
        <div class="derecha">
            <img src="user-icon.svg" alt="" class="img">
            <?php
                if(isset($_SESSION['correo'])){
            ?>
        <ul class="nav">
            <li>Bienvenido <?php echo "<br>".$_SESSION['nombre'];?>
                <ul>
                    <?php
                        if($_SESSION['admin'] == 'si'){
                            echo '<li><a href="historial.php">Historial</a></li>';
                        }
                    ?>
                    <li><a href="../includes/logout.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
        <?php
            }else{
        ?>
        <a href="login.php">MI CUENTA <br> Inicia sesión o Registrate</a>
        <?php
            }
            ?>
        <div class="carrito">
            <a href="../vistas/carrito.php"><img src="bxl-shopify.svg" alt=""></a>
        </div>
    </div>
    </header>
    <div class="menu">
    <ul class="dep">
            <li>Departamentos
                <ul>
                    <li><a href="../vistas/departamentos/electronicos.php">Electrónica y Tecnología</a></li>
                    <li><a href="../vistas/departamentos/belleza.php">Belleza</a></li>
                    <li><a href="../vistas/departamentos/ninos.php">Niñas y niños</a></li>
                    <li><a href="../vistas/departamentos/deportes.php">Deportes</a></li>
                    <li><a href="../vistas/departamentos/mascotas.php">Mascotas</a></li>
                    <li><a href="../vistas/departamentos/dulceria.php">Dulcería</a></li>
                </ul>
                <img src="../recursos/img/arrow_down.svg" alt="">
            </li>
        </ul>
    </div>
    <div class="contenedortab">
        <?php
            require '../includes/db.php';
            $id_cliente = $_POST['id_cliente'];
            if(empty($id_cliente) || $id_cliente == 0){
                $sql = $conn->query("SELECT * FROM historial");
            }else{
                $sql = $conn->query("SELECT * FROM historial WHERE id_cliente = '$id_cliente'");
            }
            echo '<table>';
            echo '<tr><th>Id Historial</th><th>Id Cliente</th><th>Foto Producto</th><th>Producto</th><th>Nombre Cliente</th><th>Correo</th></tr>';
            while($row = $sql->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['id_historial']."</td>";
                echo "<td>".$row['id_cliente']."</td>";
                echo "<td>"."<img src='data:image/jpeg;base64,".$row['img']."'></td>";
                echo "<td>".$row['nombre_producto']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['correo']."</td>";
                echo "<td><a href='eliminarhistorial.php?id=".$row['id_historial']."'>Eliminar</a></td>";
                echo "</tr>";
            }
            if($row != $sql->fetch_assoc()){
                echo 'No hay registros';
            }
            echo '</table>';
        ?>
        <form action="historialbusc.php" method="post" autocomplete="off">
            <input type="text" placeholder="Buscar..." name="id_cliente">
            <button type="submit"><img src="search.svg" alt=""></button>
        </form>
    </div>

    <footer class="footer">
        <div class="barra">
        </div>
        <div class="texto">
            <h1>Emilio Gael Renteria Rayo</h1>
        </div>
</footer>
</body>
</html>