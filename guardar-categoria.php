<?php
if(isset($_POST)){
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
}
//Array  de Errores
    $errores = array();
    
    //Vaidar datos 
    //Validar campo nobre
    
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombrevalido = true;
    }else{
        $nombrevalido = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    if(empty($errores)){
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
    echo mysqli_error($db);
    header("Location: index.php");
?>