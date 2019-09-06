<?php
    //Checar si no estan vacios
if(isset($_POST)){
    require_once 'includes/conexion.php';
    if(!$_SESSION){
        session_start();
    }

    session_start();
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
    
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
    //Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidosvalido = true;
    }else{
        $apellidosvalido = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }
    //Validar correo
    if(!empty($email) && FILTER_var($email, FILTER_VALIDATE_EMAIL)){
        $emailvalido = true;
    }else{
        $emailvalido = false;
        $errores['email'] = "El email no es válido";
    }
    //Validar password
    if(!empty($password)){
        $passwordvalido = true;
    }else{
        $passwordvalido = false;
        $errores['password'] = "La contraseña esta vacia";
    }
    $guardar_usuario = false;
    if(empty($errores)){
        $guardar_usuario= true;
        //cifrar contraseña
        $password_segura = password_hash($password,PASSWORD_BCRYPT, ['cost'=>4]);
        $sql = "INSERT INTO usuarios values (null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        if($guardar){
            $_SESSION['completado']= "El registro se ha completado con éxito";
        }else{
            $_SESSION['errores']['general']="Fallo al guardar el usuario";
        }
        //Insertar en la tabla usuario
    }else{
       $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
?>