<?php
if(isset($_POST)){
    require_once 'includes/conexion.php';
    $titulo= isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
}  
//Array  de Errores
    $errores = array();
    
    //Vaidar datos 
    //Validar campo nobre
    
    if(!empty($titulo) && !is_numeric($titulo) && !preg_match("/[0-9]/", $titulo)){
        $titulovalido = true;
    }else{
        $nombrevalido = false;
        $errores['titulo'] = "El titulo no es valido";
    }
    if(empty($descripcion)){
        $nombrevalido = false;
        $errores['descripcion'] = "La desripcion no es valida";
    }
    if(empty($categoria) && is_numeric($categoria)){
        $errores['categoria']="La categoria no es valida";
    }
    if(empty($errores)){
        $sql = "INSERT INTO entradas VALUES (NULL, $usuario , $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql);
    }else{
        $_SESSION['errores_entrada'] = $errores;
    }
    if($guardar){
        header("Location: index.php");
    }else{
        header("Location: crear-entradas.php");
    }
        
?>