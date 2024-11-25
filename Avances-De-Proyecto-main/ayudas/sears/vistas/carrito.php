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
    <link rel="stylesheet" href="../recursos/css/carrito.css">
</head>
<body>
<header>
        <div class="logo">
            <a href="../index.php"><img src="../recursos/logo_white.svg" alt=""></a>
        </div>
        <div class="derecha">
            <img src="../recursos/user-icon.svg" alt="" class="img">
            <?php
                if(isset($_SESSION['correo'])){
            ?>
        <ul class="nav">
            <li>Bienvenido <?php echo "<br>".$_SESSION['nombre'];?>
                <ul>
                    <?php
                        if($_SESSION['admin'] == 'si'){
                            echo '<li><a href="../recursos/historial.php">Historial</a></li>';
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
            <a href="carrito.php"><img src="../recursos/bxl-shopify.svg" alt=""></a>
        </div>
    </div>
    </header>
    <div class="menu">
    <ul class="dep">
            <li>Departamentos
                <ul>
                    <li><a href="departamentos/electronicos.php">Electrónica y Tecnología</a></li>
                    <li><a href="departamentos/belleza.php">Belleza</a></li>
                    <li><a href="departamentos/ninos.php">Niñas y niños</a></li>
                    <li><a href="departamentos/deportes.php">Deportes</a></li>
                    <li><a href="departamentos/mascotas.php">Mascotas</a></li>
                    <li><a href="departamentos/dulceria.php">Dulcería</a></li>
                </ul>
                <img src="../recursos/img/arrow_down.svg" alt="">
            </li>
        </ul>
    </div>
    <div class="contenedortab">

<?php
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        echo '<table>';
        echo '<tr><th>Imagen</th><th>Producto</th><th>Precio</th><th></th></tr>';
        foreach ($_SESSION['carrito'] as $key => $producto) {
            echo '<tr>';
            echo '<td><img src="data:image/jpeg;base64,'.$producto['img'].'"></td>';
            echo '<td>'.$producto['nombre'].'</td>';
            echo '<td>'.$producto['precio'].'</td>';
            echo '<td><a href="eliminar_producto.php?key=' . $key . '">Eliminar</a></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<a href="realizar_compra.php">Comprar</a>';
    } else if(empty($_SESSION['carrito'])){
        echo 'El carrito está vacío.';
    }
    ?>
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