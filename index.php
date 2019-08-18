<?php session_start();

require 'funciones.php';


// PAGINACION ////////////////////////////////////

$fotos_por_pagina = 8;

$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;

$conexion = conexion('practica_galeria', 'root', '');

if(!$conexion) {
    header('Location: error.php');
    die();
}

$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina");
$statement->execute();
$fotos = $statement->fetchAll();

//if(!$fotos) {
//    header('Location: index.php');
//}

$statement = $conexion->prepare("SELECT FOUND_ROWS() AS total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];

$total_paginas = ceil($total_post / $fotos_por_pagina);



// INICIO DE SESION ///////////////////////////////////////////

$errores = '';
$usuario = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    

    $conexion = conexion('practica_galeria_usuarios', 'root', '');

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
    $statement->execute(array(':usuario' => $usuario));
    $resultado = $statement->fetchAll();
    
    if($resultado != false) {
        $db_pass = $resultado[0]['pass'];
 
        if(password_verify($password, $db_pass)) {
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            //echo "Datos Correctos!";
        } else {
            $errores .= '<li>Datos Incorrectos!</li>';
        }
        
    } else {
        $errores .= '<li>Datos Incorrectos</li>';
    }
}

require 'views/index.view.php';

?>