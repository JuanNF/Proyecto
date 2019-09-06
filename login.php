<?php

//Iniciar la sesion y la conexion a bd
require_once 'includes/conexion.php';
//Recoger datos del formulario

if(isset($_POST)){
    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //COnsultar para comprobar las credeciales del usuario
    $sql = "SELECT * FROM usuarios where email= '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        //Comprobar la password
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            $_SESSION['usuario']=$usuario;
        }else{
            $_SESSION['error_login']= "Login incorrecto";
        }
    }else{
        //Mensaje de Error
        $_SESSION['error_login']= "Login incorrecto";
    }
    //Combrobar la contraseña / cifrar
    
}

header('Location: index.php');
?>

