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
    <title>Galeria</title>
</head>
<body>
    <header>
        <div class="nav">
            <?php if(!isset($_SESSION['usuario'])): ?>
                <a href="registro.php" class="registrarse">Registrarse</a>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-session" name="login">
                    <i class="fas fa-user"></i><input class="form-session-user" type="text" placeholder="Usuario" name="usuario">
                    <i class="fas fa-lock"></i><input class="form-session-pass" type="password" placeholder="Contraseña" name="password">
                    <i class="submit fa fa-arrow-right" onclick="login.submit()"></i>
                </form>
            <?php elseif(isset($_SESSION['usuario'])): ?>
                <div class="upload">
                    <a href="subir.php"><i class="fas fa-upload"></i></a>
                    <a href="cerrar.php"><i class="fas fa-power-off"></i></a>
                </div>
            <?php endif; ?>
        </div>

        <?php if(!empty($errores)): ?>
            <div class="login-error-2">
                <p>Datos Incorrectos!</p>
            </div>
        <?php endif; ?>

        <div class="contenedor">
            <h1 class="titulo">Galeria de Imagenes</h1>
        </div>
    </header>

    <section class="fotos">
        <div class="contenedor">
            <?php foreach($fotos AS $foto): ?>
                <div class="thumb">
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
                    </a>
                </div>
            <?php endforeach; ?>

            <div class="paginacion">
                <?php if ($pagina_actual > 1): ?>
                    <a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fas fa-long-arrow-alt-left"></i> &nbsp; Pagina Anterior</a>
                <?php endif ?>

                <?php if ($total_paginas != $pagina_actual): ?>
                    <a href="index.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha">Pagina Siguiente &nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                <?php endif ?>

                <!-- <a href="#" class="izquierda"><i class="fas fa-long-arrow-alt-left"></i> &nbsp; Pagina Anterior</a>
                <a href="#" class="derecha">Pagina Siguiente &nbsp; <i class="fas fa-long-arrow-alt-right"></i></a> -->
            </div>
        </div>
    </section>

    <footer>
        <p class="copyright">Galeria creada por YouSay</p>
    </footer>


</body>
</html>