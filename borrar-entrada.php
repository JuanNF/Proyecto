<?php
require_once 'includes/conexion.php';
if(!isset($_SESSION)){
    session_start();
}
if(!empty($_SESSION['usuario']) && !empty($_GET['id'])){
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    $sql="DELETE FROM entradas WHERE usuario_id = $usuario_id AND id=$entrada_id";
    mysqli_query($db, $sql);
    
}
header("Location: index.php")
?>
