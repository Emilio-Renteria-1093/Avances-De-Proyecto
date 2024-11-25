<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARS | Inicia sesión o Registrate</title>
    <link rel="stylesheet" href="../recursos/css/loginreg.css">
</head>
<body>
    <header>
        <a href="../index.php"><img src="../recursos/logo_white.svg" alt=""></a>
    </header>
    <form action="../includes/controladorreg.php" method="post">
        <h1>Registrate</h1>
        <input type="text" name="nombre" placeholder="Nombre" autocomplete="off">
        <input type="text" name="apep" placeholder="Apellido Paterno" autocomplete="off">
        <input type="text" name="apem" placeholder="Apellido Materno" autocomplete="off">
        <input type="email" name="correo" placeholder="Correo electronico" autocomplete="off">
        <input type="text" name="pass" placeholder="Contraseña" autocomplete="off">
        <input type="submit" value="Registrar" name="reg" class="boton">
        <input type="submit" value="¿Ya tienes una cuenta? Inicia Sesión" name="in"  class="boton">
    </form>
</body>
</html>