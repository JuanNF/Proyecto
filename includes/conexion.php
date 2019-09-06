<?php

//Conexión
$server = 'localhost';
$username= 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($server, $username, $password, $database) or die("No se pudo conectra a la base de datos");

mysqli_query($db, "set names 'UTF8'");


if(!isset($_SESSION)){
    session_start();
}
?>