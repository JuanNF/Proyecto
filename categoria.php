<?php require 'includes/helpers.php';?>
<?php require 'includes/conexion.php';?>
<?php require 'includes/cabecera.php';?>
<?php
    $categoria = conseguirCategoria($db, $_GET['id']);
    if(empty($categoria['id'])){
        header("Location: index.php");
    }
?>
<?php require_once 'includes/lateral.php';?>
    <div id="principal">  
        <h1>Entradas de <?= $categoria['nombre'] ?></h1>
        <?php
        $entradas = conseguirEntradas($db, null, $categoria['id']);
        if(!empty($entradas)):
            while($entrada=mysqli_fetch_assoc($entradas)):
        ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?= $entrada['titulo']?></h2>
                        <p>
                            <?= substr($entrada['descripcion'],0, 200)."..." ?>
                        </p>
                        <span class="fecha">
                            <?= $entrada['categoria']." | ".$entrada['fecha'] ?>
                        </span>
                </a>
            </article>
        <?php
            endwhile;
        else:
        ?>
           <div class="alerta">No hay entradas en esta categoria</diV>
        <?php endif; ?>
    </div>           
<?php require_once 'includes/pie.php';?>