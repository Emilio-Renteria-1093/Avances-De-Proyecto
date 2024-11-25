<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARS</title>
    <link rel="stylesheet" href="recursos/css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href=""><img src="recursos/logo_white.svg" alt=""></a>
        </div>
        <div class="derecha">
            <img src="recursos/user-icon.svg" alt="" class="img">
            <?php
                if(isset($_SESSION['correo'])){
            ?>
        <ul class="nav">
            <li>Bienvenido <?php echo "<br>".$_SESSION['nombre'];?>
                <ul>
                    <?php
                        if($_SESSION['admin'] == 'si'){
                            echo '<li><a href="recursos/historial.php">Historial</a></li>';
                        }
                    ?>
                    <li><a href="includes/logout.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
        <?php
            }else{
        ?>
        <a href="vistas/login.php">MI CUENTA <br> Inicia sesión o Registrate</a>
        <?php
            }
            ?>
        <div class="carrito">
            <a href="vistas/carrito.php"><img src="recursos/bxl-shopify.svg" alt=""></a>
        </div>
    </div>
    </header>
    <div class="menu">
    <ul class="dep">
            <li>Departamentos
                <ul>
                    <li><a href="vistas/departamentos/electronicos.php">Electrónica y Tecnología</a></li>
                    <li><a href="vistas/departamentos/belleza.php">Belleza</a></li>
                    <li><a href="vistas/departamentos/ninos.php">Niñas y niños</a></li>
                    <li><a href="vistas/departamentos/deportes.php">Deportes</a></li>
                    <li><a href="vistas/departamentos/mascotas.php">Mascotas</a></li>
                    <li><a href="vistas/departamentos/dulceria.php">Dulcería</a></li>
                </ul>
                <img src="recursos/arrow_down.svg" alt="">
            </li>
        </ul>
    </div>

        <div class="slider"> 
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <div class="slide first">
                    <img src="recursos/img/slider/slider-1.png" alt="">
                </div>
                <div class="slide">
                    <img src="recursos/img/slider/slider-2.png" alt="">
                </div>
                <div class="slide">
                    <img src="recursos/img/slider/slider-3.png" alt="">
                </div>
            <div class="slide">
                <<img src="recursos/img/slider/slider-4.png" alt="">
            </div>
            <div class="nav-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
        </div>
        
        <div class="nav-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
    </div>

    <div class="cont">
        <div class="anuncio">
            <img src="recursos/img/slider/anuncio-2.png" alt="">
        </div>
    </div>
    <div class="desc">
        <a href="vistas/departamentos/mascotas.php"><img src="recursos/img/descuentos/masc.png" alt=""></a>
        <a href="vistas/departamentos/electronicos.php"><img src="recursos/img/descuentos/pant.png" alt=""></a>
        <a href="vistas/departamentos/ninos.php"><img src="recursos/img/descuentos/nin.png" alt=""></a>
    </div>
    <div class="destac">
        <div class="titulo">
            <h1>Destacados</h1>
            <div class="linea"></div>
        </div>
    </div>
        <div class="container-items">
            <?php
        require 'includes/db.php';
        $sql = $conn->query("SELECT * FROM belleza");
        $sql2 = $conn->query("SELECT * FROM electronicos");
        $sql3 = $conn->query("SELECT * FROM dulceria");
        $sql4 = $conn->query("SELECT * FROM ninos");
        if($row = $sql->fetch_assoc()){
            echo '<form action="includes/controladorcarrito.php" method="post">';
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
        if($row = $sql2->fetch_assoc()){
            echo '<form action="includes/controladorcarrito.php" method="post">';
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
        if($row = $sql3->fetch_assoc()){
            echo '<form action="includes/controladorcarrito.php" method="post">';
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
        </div>
    <script src="js/slider.js"></script>
    <div class="contactar">
        <div class="titulo">
            <h1>Contactar</h1>
        </div>
        <div class="redes">
            <h2>Siguenos en redes sociales</h2>
            <div class="img">    
                <a href="https://www.facebook.com/searsmexico"  target="_blank"><img src="recursos/img/redes/fb.svg" alt=""></a>
                <a href="https://www.instagram.com/searsmexico/" target="_blank"><img src="recursos/img/redes/ig.svg" alt=""></a>
                <a href="https://twitter.com/searsmexico" target="_blank"><img src="recursos/img/redes/tw.svg" alt=""></a>
                <a href="https://www.tiktok.com/@searsmexico" target="_blank"><img src="recursos/img/redes/tt.svg" alt=""></a>
            </div>
        </div>
        <div class="correo">
            <a href="mailto:sears.internet@sears.com.mx" class=""> Por email</a>
        </div>
    </div>
    <footer class="footer">
        <div class="barra">
        </div>
        <div class="texto">
            <h1>Emilio Gael Renteria Rayo</h1>
            <h1><a href="contacto.html" style="text-decoration:none; color:#000;">Contacto</a>
        </div>
</footer>
</body>
</html>