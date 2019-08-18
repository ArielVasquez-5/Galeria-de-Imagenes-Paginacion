<?php session_start();

require 'funciones.php';

if(isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

    if(empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        $conexion = conexion('practica_galeria_usuarios', 'root', '');

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }

        if($password != $password2) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
        $password2 = password_hash($_POST['password2'], PASSWORD_DEFAULT, ['cost' => 10]);
      
    }   

    if($errores == '') {
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass)');
        $statement->execute(array(':usuario' => $usuario, ':pass' => $password));

        header('Location: index.php');
    }

    

    
    
}





require 'views/registro.view.php';

?>