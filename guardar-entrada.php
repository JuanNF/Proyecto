<?php
if(isset($_POST)){
    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php';
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
        if($_GET['editar']){
            $entrada_id=$_GET['editar'];
            $usuario_id=$_SESSION['usuario']['id'];
            $sql = "UPDATE entradas set titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria where id=$entrada_id and usuario_id =$usuario_id";
        }else{
            $sql = "INSERT INTO entradas VALUES (NULL, $usuario , $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
    }else{
        $_SESSION['errores_entrada'] = $errores;
    }
    if($guardar && !empty($_GET['editar'])){
        borrarErrores();
        header("Location: entrada.php?id=".$_GET['editar']);
    }else if(!empty($_GET['editar']) && !empty($errores)){
        header("Location: editar-entrada.php");
    }else if(empty($_GET['editar']) && !empty($errores)){
        header("Location: crear-entradas.php");
    }else if($guardar && empty($_GET['editar']) && !isset($errores)){
        header("Location: index.php");
    }
        
?>