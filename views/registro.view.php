<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="icon" href="ico/1564451550.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Galeria - Registro</title>
</head>
<body>
    <div class="contenedor login">
        <h2 class="login-titulo">Crea tu cuenta!</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-register">

            <label for="user">Crea tu Usuario:</label>
            <input class="form-user" type="text" id="user" name="usuario">

            <label for="password">Crea tu Contraseña:</label>
            <input class="form-pass" type="password" id="password" name="password">

            <label for="password2">Repite tu Contraseña:</label>
            <input class="form-pass" type="password" id="password2" name="password2">

            <input type="submit" class="btn" value="Registrarse">

            <?php if(!empty($errores)): ?>
                <div class="login-error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>
    </div>


</body>
</html>