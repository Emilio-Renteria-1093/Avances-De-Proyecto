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
    <form action="../includes/controladorinicio.php" method="post">
        <h1>Iniciar Sesion</h1>
        <input type="email" name="correo" placeholder="Correo electronico" autocomplete="off">
        <input type="text" name="pass" placeholder="Contraseña" autocomplete="off">
        <input type="submit" value="Iniciar Sesión" name="in">
        <input type="submit" value="¿Eres nuevo?, Registrate" name="reg">
    </form>
    
</body>
</html>