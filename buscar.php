
<?php require 'includes/cabecera.php';?>
<?php
    if(empty($_POST['busqueda'])){
        header("Location: index.php");
    }
    
?>
<?php require_once 'includes/lateral.php';?>
    <div id="principal">  
        <h1>Buqueda: <?= $_POST['busqueda']?></h1>
        <?php
        $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);
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