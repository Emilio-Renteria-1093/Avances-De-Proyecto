<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARS</title>
    <link rel="stylesheet" href="../../recursos/css/departamentos.css">
</head>
<body>
<header>
        <div class="logo">
            <a href="../../index.php"><img src="../../recursos/logo_white.svg" alt=""></a>
        </div>
        <div class="derecha">
            <img src="../../recursos/user-icon.svg" alt="" class="img">
            <?php
                if(isset($_SESSION['correo'])){
            ?>
        <ul class="nav">
            <li>Bienvenido <?php echo "<br>".$_SESSION['nombre'];?>
                <ul>
                    <?php
                        if($_SESSION['admin'] == 'si'){
                            echo '<li><a href="../../recursos/historial.php">Historial</a></li>';
                        }
                    ?>
                    <li><a href="../../includes/logout.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
        <?php
            }else{
        ?>
        <a href="../login.php">MI CUENTA <br> Inicia sesión o Registrate</a>
        <?php
            }
            ?>
        <div class="carrito">
            <a href="../carrito.php"><img src="../../recursos/bxl-shopify.svg" alt=""></a>
        </div>
    </div>
    </header>
    <div class="menu">
    <ul class="dep">
            <li>Departamentos
                <ul>
                    <li><a href="electronicos.php">Electrónica y Tecnología</a></li>
                    <li><a href="belleza.php">Belleza</a></li>
                    <li><a href="ninos.php">Niñas y niños</a></li>
                    <li><a href="deportes.php">Deportes</a></li>
                    <li><a href="mascotas.php">Mascotas</a></li>
                    <li><a href="dulceria.php">Dulcería</a></li>
                </ul>
                <img src="../../recursos/arrow_down.svg" alt="">
            </li>
        </ul>
    </div>

    <div class="container-items">
            <?php
        require '../../includes/db.php';
        $sql = $conn->query("SELECT * FROM electronicos");
        while($row = $sql->fetch_assoc()){
            echo '<form action="../../includes/controladorcarrito.php" method="post">';
            echo "<div class='item'>";
			echo "<figure>";
			echo "<img src='data:image/jpeg;base64,".base64_encode($row['img'])."' alt='producto'>";
			echo "</figure>";
			echo '<div class="info-product">';
			echo "<h2>".$row['nombre_prod']."</h2>";
			echo '<p class="price">$'.$row['precio'].'</p>';
            if(isset($_SESSION['correo'])){
                echo "<input type='hidden' name='id' value='".$row['id_producto']."'>";
                echo '<input type="hidden" name="img" value="' . base64_encode($row['img']) . '">';
                echo "<input type='hidden' name='nombre' value='".$row['nombre_prod']."'>";
                echo "<input type='hidden' name='precio' value='".$row['precio']."'>";
                echo '<button type="submit" name="añadir">Añadir al carrito</button>';
            }else{
                echo '<button type="submit" name="iniciar">Añadir al carrito</button>';
            }
			echo "</div>";
            echo "</div>";
            echo "</form>";
        }
        ?>
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