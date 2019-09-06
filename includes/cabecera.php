<?php
require_once 'conexion.php';
require_once 'includes/helpers.php';
?>
<!DOCTYPE HMTL>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link href="assets/css/estilos.css" rel="stylesheet" type="text/css"/>
        <title>Blog de Videojuegos</title>
    </head>
    <body>
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">Blog de Videojuegos</a>
            </div>
        <nav id="menu">
            <ul>
                <li>
                    <a href="index´php">Inicio</a>
                </li>
                <?php
                    $categorias = conseguirCategorias($db);
                    if(empty($categoria)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                ?>
                    <li>
                        <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']?> </a>
                    </li>
                <?php 
                    endwhile;
                    endif;
                ?>
                <li>
                    <a href="index´php">Sobre mi</a>
                </li>
                <li>
                    <a href="index´php">Contacto</a>
                </li> 
            </ul>
        </nav>
        <div id="clearfix">
        </div>
        </header>
        <div id="contenedor">